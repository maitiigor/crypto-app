<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\InvestmentPlan;

class StoreDepositRequest extends FormRequest
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
            'investment_plan_id' => 'required|exists:investment_plans,id',
            'payment_method' => 'required|exists:payment_methods,account_id',

        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            if ($this->validateDepositInvestmentAmount()) {
                $validator->errors()->add('invalid', 'The inputed deposit amount is less than the minimum deposit amount for the selected investment plan');
            }
        });
    }

    public function validateDepositInvestmentAmount(){
        if(($this->investment_plan_id && $this->amount) != null ){
            $investment_plan = InvestmentPlan::find($this->investment_plan_id);

            if($this->amount < $investment_plan->amount){
                return true;
            }

        }
      return false;
    }
}
