<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 10/5/2017
 * Time: 9:33 AM
 */

namespace App\Http\Requests;


use Dingo\Api\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|between:6,16',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => __('custom_validation.password_required'),
            'email.required' => __('custom_validation.email_required'),
            'email.email' => __('custom_validation.email_format'),
        ];
    }
}