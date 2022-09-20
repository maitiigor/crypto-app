<?php

namespace App\Http\Controllers;

use App\Models\Withdrawal;
use App\Models\User;
use Session;
use App\DataTables\WithdrawalDataTable;
use App\Http\Requests\StoreWithdrawalRequest;
use App\Http\Requests\UpdateWithdrawalRequest;

class WithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(WithdrawalDataTable $withdrawalDataTable)
    {
        //
        return $withdrawalDataTable->render('pages.withdrawals.index');
        //return view('pages.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
        return view('pages.withdrawals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWithdrawalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWithdrawalRequest $request)
    {
        //
        $address_type = "";
        

        if(User::where('tron_account_id',$request->address)->first() != null){
            $address_type = "TRN";
        }
        if(User::where('doge_account_id',$request->address)->first() != null){
            $address_type = "XDG";
        }

        if(User::where('ethereum_account_id',$request->address)->first() != null){
            $address_type = "ETH";
        }

        if(User::where('bitcoin_account_id',$request->address)->first() != null){
            $address_type = "BTC";
        }

        if(User::where('litecoin_account_id',$request->address)->first() != null){
            $address_type = "LTC";
        }
        $withdrawal = Withdrawal::create(array_merge($request->all(),['address_type' => $address_type,'user_id' => auth()->user()->id]));

        $user = User::find(auth()->user()->id);
        $user->account_balance = $user->account_balance - $request->amount;
        $user->save();

        Session::flash('success', "withdrawal request generated successfully. Please wait while the request is been proccessed.");
        
        return redirect(route('withdrawal'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Withdrawal  $withdrawal
     * @return \Illuminate\Http\Response
     */
    public function show(Withdrawal $withdrawal)
    {
        //
        return view('pages.withdrawals.show', compact('withdrawal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Withdrawal  $withdrawal
     * @return \Illuminate\Http\Response
     */
    public function edit(Withdrawal $withdrawal)
    {
        //
        return view('pages.withdrawals.edit',compact('withdrawal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWithdrawalRequest  $request
     * @param  \App\Models\Withdrawal  $withdrawal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWithdrawalRequest $request, Withdrawal $withdrawal)
    {
        //
        $withdrawal->fill($request->all());
        $withdrawal->save();
        Session::flash('success', "withdrawal data updated successfully");
        return redirect(route('withdrawals.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Withdrawal  $withdrawal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Withdrawal $withdrawal)
    {
        //
        $withdrawal->delete();
        Session::flash('success', "withdrawal data deleted successfully");
        return redirect(route('withdrawals.index'));
    }

    
}
