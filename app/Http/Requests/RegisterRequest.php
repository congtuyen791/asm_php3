<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|min:6|max:32',
            'email' => 'required|min:6|email|max:32',
            'password' => 'required|min:6',
        ];
    } 
    public function messages()
    {
        return [
            'name.required' => 'ten bắt buộc nhập',
            'name.min' => 'ten tối thiểu 6 ký tự',
            'name.max' => 'ten tối đa 32 ký tự',
            'email.required' => 'email bắt buộc nhập',
            'email.min' => 'email tối thiểu 6 ký tự',
            'email.max' => 'email tối đa 32 ký tự',
            'email.email' => 'Email phải đúng định dạng',
            'password.required' => 'Mật khẩu bắt buộc nhập',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
        ];
    }
}
