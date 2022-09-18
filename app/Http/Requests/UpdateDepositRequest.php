<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepositRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|decimal',
            'investment_plan_id' => 'required|exists:investment_plans,id',
            'attempt_code' => 'nullable',
            'gateway_reference_code' => 'nullable',
            'gateway_name' => 'nullable',
            'gateway_url' => 'nullable',
            'gateway_initilization_response' => 'nullable'
        ];
    }
}
