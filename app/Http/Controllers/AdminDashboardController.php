<?php

namespace App\Http\Controllers;

use App\Events\WithdrawalPaidEvent;
use App\Models\Deposit;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Events\DepositConfirmedEvent;
use App\Models\User;
use App\Models\Withdrawal;
use App\Models\Referal;
use App\Models\Earning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Session;

class AdminDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $is_payment_from_account = false;

        return view('admin.dashboard');
    }

    public function confirmDeposit(Request $request, $id)
    {

        $deposit = Deposit::find($id);

        if ($deposit == null) {

            Session::flash('error', 'Deposit not found');

            return redirect(route('deposits.index'));
        }

        $verified_first_deposit = Deposit::where('user_id', $deposit->user_id)->where('is_verified', true)->first();
        if ($deposit->user->is_refered == true && $verified_first_deposit == null) {

            $referal = Referal::where('refered_user_id', $deposit->user_id)->first();

            if ($referal != null) {
                //return "here";
                $earning = new Earning();

                $amount = 0.1 * $deposit->amount;

                $earning->user_id = $referal->referer_user_id;
                $earning->amount = $amount;
                $earning->referal_id = $referal->id;
                $earning->save();

                $referal->referer_user->account_balance = $referal->referer_user->account_balance + $amount;
                $referal->referer_user->save();
            }
        }

        $deposit->is_verified = 1;

        $deposit->save();
        DepositConfirmedEvent::dispatch($deposit);

        Session::flash('success', 'Deposit verification saved successfully');

        return redirect(route('deposits.index'));
    }

    public function payWithdrawalRequest(Request $request, $id)
    {

        $withdrawal = Withdrawal::find($id);

        if ($withdrawal != null) {
            $time = time();
            $message = $time . "GET/v2/exchange-rates";
            $signature = hash_hmac("SHA256", $message, env('COIN_BASE_SECRET'));

            try {
                //code...
                $response = Http::withHeaders([
                    'CB-ACCESS-SIGN' => $signature,
                    'CB-ACCESS-TIMESTAMP' => $time,
                    'CB-ACCESS-KEY' => env('COIN_BASE_KEY'),
                    'CB-VERSION' => '2022-09-06',
                ])->acceptJson()->get('https://api.coinbase.com/v2/exchange-rates')->throw()->json();

                $exchange_rate = $response['data']['rates'][$withdrawal->address_type];

                $payment_amount = $exchange_rate * $withdrawal->amount;

                $payment_method = PaymentMethod::where('account_name', $withdrawal->address_type)->first();

                if ($payment_method != null) {

                    try {
                        //code...
                        $time = time();
                        $post_data = [
                            "type" => "send",
                            "to" => $withdrawal->address,
                            'amount' => $payment_amount,
                            'currency' => $withdrawal->address_type,
                        ];
                        $message = $time . "POST/v2/accounts/" . $payment_method->account_id . "/transactions" . json_encode($post_data);
                        $signature = hash_hmac("SHA256", $message, env('COIN_BASE_SECRET'));

                        $response = Http::withHeaders([
                            'CB-ACCESS-SIGN' => $signature,
                            'CB-ACCESS-TIMESTAMP' => $time,
                            'CB-ACCESS-KEY' => env('COIN_BASE_KEY'),
                            'CB-VERSION' => '2022-09-06',
                        ])->acceptJson()->get('https://api.coinbase.com/v2/accounts/' . $payment_method->account_id . '/transactions')->throw();

                        $res = json_decode($response->body());

                        $payment = new Payment();

                        $payment->withdrawal_id = $withdrawal->id;
                        $payment->amount = $withdrawal->amount;
                        $payment->gateway_reference_code = $res->data->id;
                        $payment->gateway_name = "coinbase";
                        $payment->gateway_url = $res->data->resource_path;
                        if ( /* $res->data->status */"pending" == "pending") {
                            $payment->is_verified = 0;
                        } else {
                            $payment->is_verified = 1;
                        }
                        $payment->save();
                        $withdrawal->is_payed = 1;
                        $withdrawal->save();
                        $extra_mesage = $payment->is_verfied ? "" : "But yet to be verified";

                        Session::flash('success', "Payment done successfully " . $extra_mesage);

                        WithdrawalPaidEvent::dispatch($payment);

                    } catch (\Illuminate\Http\Client\RequestException $th) {

                        Session::flash('error', "Something went wrong please try again");
                        return redirect(route('withdrawals.index'));
                    }

                }

            } catch (\Illuminate\Http\Client\RequestException $th) {

                Session::flash('error', "Something went wrong please try again");

                return redirect(route('withdrawals.index'));

            }

        }
        //  dd( $th->getMessage());
        return redirect(route('withdrawals.index'));
    }

    public function fakeWithdrawalPayment(Request $request, $id)
    {
        $withdrawal = Withdrawal::find($id);

        if ($withdrawal != null) {
            $payment = new Payment();

            $payment->withdrawal_id = $withdrawal->id;
            $payment->amount = $withdrawal->amount;
            $payment->gateway_reference_code = "FK-" . sha1(rand());
            $payment->gateway_name = "fk";
            $payment->gateway_url = "payment/fake";
            $payment->is_verified = 1;
            $payment->save();

            $withdrawal->is_payed = 1;
            $withdrawal->save();

            Session::flash('success', "Payment done successfully ");
            WithdrawalPaidEvent::dispatch($payment);
        }

        return redirect(route('withdrawals.index'));
    }

    public function accountDisable(Request $request, $id)
    {

        $user = User::find($id);

        if ($request->status != null && $user != null) {

            if ($request->status == 1 || $request->status == 0) {
                $user->is_disabled = $request->status;
                $user->save();
                Session::flash('success', 'Account Updated successfully');
            }
        }

        return redirect(route('users.index'));
    }
}
