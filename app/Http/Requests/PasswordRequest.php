<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'password' => 'required|min:6|max:32',
            'password_new' => 'required|min:6|max:32',
            'password_new_xn' => 'required|min:6|max:32',
        ];
    } 
    public function messages()
    {
        return [
            'password.required' => 'Mật khẩu bắt buộc nhập',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
            'password.max' => 'Mật khẩu tối đa 50 ký tự',
            'password_new.required' => 'Mật khẩu bắt buộc nhập',
            'password_new.min' => 'Mật khẩu tối thiểu 6 ký tự',
            'password_new.max' => 'Mật khẩu tối đa 50 ký tự',
            'password_new_xn.required' => 'Mật khẩu bắt buộc nhập',
            'password_new_xn.min' => 'Mật khẩu tối thiểu 6 ký tự',
            'password_new_xn.max' => 'Mật khẩu tối đa 50 ký tự',

        ];
    }
}
