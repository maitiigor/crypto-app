<?php

namespace App\Http\Controllers;

use App\Events\ContactMessageSentEvent;
use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\InvestmentPlan;
use Illuminate\Support\Facades\Http;
use Session;

class FrontEndController extends Controller
{

    public function index(Request $request)
    {
        
       $investment_plans = InvestmentPlan::all();
        
       
        return view('welcome',compact('investment_plans'));
    }

    public function faq()
    {

        return view('faq');
    }

    public function rules()
    {

        return view('rules');
    }

    public function support()
    {

        return view('support');
    }
    public function saveSupport(StoreContactRequest $request)
    {
        $contact = Contact::create($request->all());

        ContactMessageSentEvent::dispatch($contact);

        Session::flash('success', 'Message successfully sent. we will get back to you in the shortest time');

        return view('support');
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
