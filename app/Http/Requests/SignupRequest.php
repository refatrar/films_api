<?php

namespace App\Http\Requests;

class SignupRequest extends BaseRequest
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
            'id' => 'nullable',
            'name' => 'required',
            'email' => 'required|unique:users',
            'remember_token' => 'nullable',
            'email_verified_at' => 'nullable',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|max:20|same:password'
        ];
    }
}
