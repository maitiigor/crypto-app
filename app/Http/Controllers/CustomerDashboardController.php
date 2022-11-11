<?php

namespace App\Http\Controllers;

use App\DataTables\CustomerDepositDataTable;
use App\Models\Deposit;
use App\Http\Requests\StoreDepositRequest;
use App\Http\Requests\UpdateDepositRequest;
use App\Http\Requests\StoreWithdrawalRequest;
use App\Models\Earning;
use App\Models\InvestmentPlan;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Http;


class CustomerDashboardController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deposit(Request $request)
    {
        $investment_plans = InvestmentPlan::all();
        $payment_methods = PaymentMethod::all();

        return view('dashboard.customer.deposit', compact('investment_plans', 'payment_methods'));
    }

    public function depositList(CustomerDepositDataTable $customerDepositDataTable)
    {

        return $customerDepositDataTable->render('dashboard.customer.deposit-list');
        // return view('dashboard.customer.deposit-list',compact('investment_plans'));
    }

    public function referals(Request $request)
    {

        $referal_commissions = Earning::where('user_id', auth()->user()->id)->where('referal_id', '!=', null)->get();

        return view('dashboard.customer.referals', compact('referal_commissions'));
    }

    public function withdrawal(CustomerDepositDataTable $customerDepositDataTable)
    {
        $user = User::find(auth()->user()->id);
        $withdrawals = Withdrawal::where('user_id', auth()->user()->id)->get();
        $payment_methods = [];

        if ($user != null) {

            if ($user->bitcoin_account_id != null) {
                $payment_methods[] = [
                    'id' => $user->bitcoin_account_id,
                    'name' => "BTC",
                ];
            }

            if ($user->tron_account_id != null) {
                $payment_methods[] = [
                    'id' => $user->tron_account_id,
                    'name' => "TRN",
                ];
            }

            if ($user->doge_account_id != null) {
                $payment_methods[] = [
                    'id' => $user->doge_account_id,
                    'name' => "XDG",
                ];
            }

            if ($user->ethereum_account_id != null) {
                $payment_methods[] = [
                    'id' => $user->ethereum_account_id,
                    'name' => "ETH",
                ];
            }

        }

        return view('dashboard.customer.withdrawal', compact('payment_methods', 'withdrawals'));
        // return view('dashboard.customer.deposit-list',compact('investment_plans'));
    }

    public function getEarnings(Request $request)
    {
        $earnings = Earning::where('user_id', auth()->user()->id)->get();

        return view('dashboard.customer.earnings', compact('earnings'));
        // return view('dashboard.customer.deposit-list',compact('investment_plans'));
    }

    public function saveWithdrawal(StoreWithdrawalRequest $request)
    {
        //
        $address_type = "";

        if (User::where('tron_account_id', $request->address)->first() != null) {
            $address_type = "TRN";
        }
        if (User::where('doge_account_id', $request->address)->first() != null) {
            $address_type = "DOGE";
        }

        if (User::where('ethereum_account_id', $request->address)->first() != null) {
            $address_type = "ETH";
        }

        if (User::where('bitcoin_account_id', $request->address)->first() != null) {
            $address_type = "BTC";
        }

        if (User::where('litecoin_account_id', $request->address)->first() != null) {
            $address_type = "LTC";
        }
        $withdrawal = Withdrawal::create(array_merge($request->all(), ['address_type' => $address_type, 'user_id' => auth()->user()->id]));

        $user = User::find(auth()->user()->id);
        $user->account_balance = $user->account_balance - $request->amount;
        $user->save();

        Session::flash('success', "withdrawal request generated successfully. Please wait while the request is been proccessed.");

        return redirect(route('withdrawal'));
    }

    public function saveDeposit(StoreDepositRequest $request)
    {

        $account_balance = auth()->user()->account_balance;
        $investment_plan = InvestmentPlan::find($request->investment_plan_id);
        $is_payment_from_account = true;
        $payment_method = PaymentMethod::where('account_id', $request->payment_method)->first();
        if ($account_balance == 0 || $account_balance < $request->amount && $payment_method != null) {
            $is_payment_from_account = false;
            $time = time();
            $message = $time . "POST/v2/accounts/" . $payment_method->account_id . "/addresses" . json_encode([
                'name' => " new address",
            ]);
            $signature = hash_hmac("SHA256", $message, env('COIN_BASE_SECRET'));

            try {
                //code...
                $response = Http::withHeaders([
                    'CB-ACCESS-SIGN' => $signature,
                    'CB-ACCESS-TIMESTAMP' => $time,
                    'CB-ACCESS-KEY' => env('COIN_BASE_KEY'),
                    'CB-VERSION' => '2022-09-06',
                ])->acceptJson()->post('https://api.coinbase.com/v2/accounts/' . $payment_method->account_id . '/addresses', [
                    'name' => " new address",
                ])->throw();
                // dd($response->json());

                $res = json_decode($response->body());
                $deposit = new Deposit();
                $deposit->investment_plan_id = $request->investment_plan_id;
                $deposit->user_id = auth()->user()->id;
                $deposit->address_id = $res->data->id;
                $deposit->address = $res->data->address;
                $deposit->name = $res->data->name;
                $deposit->currency = $payment_method->account_name;
                $deposit->amount = $request->amount;
                $deposit->network = $res->data->network;
                $deposit->resource = $res->data->resource;
                $deposit->resource_path = $res->data->resource_path;
                $deposit->save();

            } catch (\Illuminate\Http\Client\RequestException $th) {
                //throw $th;
                // $message = json_decode( );
                \Log::info($th->getMessage());
                Session::flash('error', "Something went wrong please try again");

                return redirect(route('customer.deposit'));

            }
        } else {
            if ($payment_method != null) {
                $user = User::find(auth()->user()->id);
                if ($user != null) {
                    $deposit = new Deposit();
                    $deposit->investment_plan_id = $request->investment_plan_id;
                    $deposit->user_id = auth()->user()->id;
                    $deposit->name = "Deposit from account";
                    $deposit->currency = "BTC";
                    $deposit->amount = $request->amount;
                   // $deposit->verified_amount = $request->amount;
                   /*  $deposit->is_completed = 0;
                    $deposit->is_verified = 0;
                    $deposit->is_verification_passed = 0; */
                    $deposit->save();

                }
                $user->account_balance = $user->account_balance - $request->amount;
                $user->save();
            } else {

                Session::flash('error', "Something went wrong please try again");

                return redirect(route('customer.deposit'));
            }

        }

        $is_payment_from_account ? Session::flash('success', "Investment deposit successful") : Session::flash('success', "Success Voucher generated !!. Please make a deposit to this BTC address " . $deposit->address);

        return redirect(route('customer.deposit'));
    }
}
