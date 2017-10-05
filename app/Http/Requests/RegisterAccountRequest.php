<?php

namespace App\Http\Requests;

use Dingo\Api\Http\FormRequest;
use Illuminate\Routing\Redirector;

class RegisterAccountRequest extends FormRequest
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
            'name'       => 'required',
            'email'           => 'required|email|unique:users',
            'password'        => 'required|between:6,16',
        ];
    }

    public function messages()
    {
        return [
            'name.required'      => __('custom_validation.name_required'),
            'password.required'        => __('custom_validation.password_required'),
            'password.min'             => __('custom_validation.password_min_six_charater'),
            'password.max'             => __('custom_validation.password_max_sixteen_character'),
            'password.alphanumeric'    => __('custom_validation.password_must_be_alphanumeric'),
            'email.required'           => __('custom_validation.email_required'),
            'email.unique'             => __('custom_validation.email_unique'),
            'email.email'              => __('custom_validation.email_format'),
        ];
    }

}
