<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Referal;
use App\Models\Earning;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_name' => ['required', 'string', 'unique:users,user_name'],
            'ref_user' => ['nullable'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {   
       
      
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'user_name' => $data['user_name'],
            'password' => Hash::make($data['password']),
        ]);
      
        if(request()->input('ref_user')){
           
            $referer = User::where('user_name',request()->input('ref_user'))->first();
          
            if($referer != null){
                $referal = new Referal();
                $referal->referer_user_id = $referer->id ;
                $referal->refered_user_id =  $user->id;
                $referal->save();

                $earning = new Earning();

                $earning->user_id = $referer->id;
                $earning->amount = "10";
                $earning->referal_id = $referal->id;
                $earning->save();

                $referer->account_balance = $referer->account_balance + 10 ;
                $referer->save();
            }
        }


        

        return $user;
    }
}
