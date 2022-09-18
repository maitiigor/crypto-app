<?php

namespace App\Http\Controllers;

use App\DataTables\DepositDataTable;
use App\Http\Requests\StoreDepositRequest;
use App\Http\Requests\UpdateDepositRequest;
use App\Models\Deposit;
use App\Models\InvestmentPlan;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Session;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DepositDataTable $depositDataTable)
    {
        //
        $deposit = Deposit::all();

        return $depositDataTable->render('pages.deposits.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $investment_plans = InvestmentPlan::all()->pluck('name', 'id')->toArray();
        $payment_methods = PaymentMethod::all();
        return view('pages.deposits.create', compact('investment_plans', 'payment_methods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDepositRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepositRequest $request)
    {
        
        $account_balance = auth()->user()->account_balance;
        $investment_plan = InvestmentPlan::find($request->investment_plan_id);
        $is_payment_from_account = true;
        if ($account_balance == 0 || $account_balance < $request->amount) {
            $is_payment_from_account = false;
            $time = time();
            $message = $time . "POST/v2/accounts/dd856131-e089-5ad7-a522-42a915549466/addresses" . json_encode([
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
                ])->acceptJson()->post('https://api.coinbase.com/v2/accounts/dd856131-e089-5ad7-a522-42a915549466/addresses', [
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
                $deposit->currency = "BTC";
                $deposit->amount = $request->amount;
                $deposit->network = $res->data->network;
                $deposit->resource = $res->data->resource;
                $deposit->resource_path = $res->data->resource_path;
                $deposit->save();

            } catch (\Illuminate\Http\Client\RequestException $th) {
                //throw $th;
                // $message = json_decode( );
                Session::flash('error', "Something went wrong please try again");

                return redirect(route('deposits.index'));

            }
        }else{
            $user = User::find(auth()->user()->id);
            if($user != null){
                $deposit = new Deposit();
                $deposit->investment_plan_id = $request->investment_plan_id;
                $deposit->user_id = auth()->user()->id;
                $deposit->name = "Deposit from account";
                $deposit->currency = "BTC";
                $deposit->amount = $request->amount;
                $deposit->verified_amount = $request->amount;
                $deposit->is_completed = 1;
                $deposit->is_verification_passed = 1;
                $deposit->save();
                
            }
            $user->account_balance = $user->account_balance - $request->amount;
            $user->save();
        }

       $is_payment_from_account ? Session::flash('success', "Investment deposit successful") : Session::flash('success', "Success Voucher generated !!. Please make a deposit to this BTC address " . $deposit->address);

        return redirect(route('deposits.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        //

        return view('pages.deposits.show', compact('deposit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        //
        return view('pages.deposits.edit', compact('deposit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepositRequest  $request
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepositRequest $request, $id)
    {
        //
        $deposit = Deposit::find($id);
        if (empty($deposit)) {
            Session::flash('errors', "Deposit not found");
            return redirect(route('deposit.index'));
        }
        $deposit->fill($request->all());
        $deposit->save();
        Session::flash('success', "Deposit updated successfully");

        return redirect(route('deposit.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
        //
        $deposit->delete();
        Session::flash('success', "Deposit deleted successfully");

        return redirect(route('deposit.index'));
    }
}
