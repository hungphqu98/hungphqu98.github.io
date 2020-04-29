<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestResetPassword extends FormRequest
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
            'new-password' => 'required',
            'new-password_confirmation' => 'required|same:password'
        ];
    }
    public function messages()
    {
        return [
            'new-password.required' => 'New password must not empty',
            'new-password_confirmation.required' => 'New password must be retyped',
            'new-password_confirmation.same' => 'Retyped password wrong'
        ];
    }
}
