<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Hash;
use Session;

class HomeController extends Controller
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
    public function index()
    {   
        if(auth()->user()->hasRole('admin')){
           $total_user_balance = User::all()->sum('account_balance'); 
            $total_deposit =    Deposit::all()->sum('verified_amount');
            $total_withdrawal = Withdrawal::all()->sum('amount');
            $total_user = User::all()->count();
            $unverified_user =  User::where('email_verified_at', null)->count();
            $blocked_user =  User::where('is_disabled', true)->count();
            $pending_withdrawal_request = Withdrawal::where('is_payed', false)->orderBy('created_at')->paginate('10');
            $pending_deposit_request = Deposit::where('is_verified', false)->orderBy('created_at')->paginate('10');

            return view('dashboard.admin.index',compact('total_user_balance','total_deposit','total_withdrawal','pending_withdrawal_request','pending_deposit_request','total_user','blocked_user','unverified_user'));
        }
        return view('dashboard.customer.index');
    }

    public function profile()
    {
        return view('dashboard.profile');
    }

    public function saveprofile(UpdateProfileRequest $request)
    {   
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->tron_account_id = $request->tron_account_id;
        $user->bitcoin_account_id = $request->bitcoin_account_id;
        $user->doge_account_id = $request->doge_account_id;
        $user->ethereum_account_id = $request->ethereum_account_id;
        if($request->password != ''){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        Session::flash('success', "User Account details updated successfully");

        return view('dashboard.profile');
    }
}
