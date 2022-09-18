<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWithdrawalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'amount' => 'required|numeric',
            'address' => 'required'
        ];
    }

    public function messages(){
        
        return [
            'address.required' => "They payment method field is required"
        ];
      
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            if ($this->validateAmount()) {
                $validator->errors()->add('invalid', 'The requested amount is greater than the available balance');
            }
        });
    }

    public function validateAmount(){
        if(($this->amount) != null ){
          

            if($this->amount > auth()->user()->account_balance){
                return true;
            }

        }
      return false;
    }
}
