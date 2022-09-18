<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => "required|unique:users,email,{$this->id}",
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'account_number' => 'nullable,decimal',
            'user_name' => "required|unique:users,user_name,{$this->id}"
        ];
    }
}
