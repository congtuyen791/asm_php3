<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => 'required|min:6|max:50',
            'email' => 'required|min:6|email|max:32',
            'birthday' => 'required',
            'phone' => 'required|numeric|digits:10',
            'address' => 'required|min:6|max:50'

        ];
    } 
    public function messages()
    {
        return [
            'name.required' => 'Họ và tên bắt buộc nhập',
            'name.min' => 'Họ và tên tối thiểu 6 ký tự',
            'name.max' => 'Họ và tên tối đa 50 ký tự',
            'email.required' => 'email bắt buộc nhập',
            'email.min' => 'email tối thiểu 6 ký tự',
            'email.max' => 'email tối đa 32 ký tự',
            'email.email' => 'Email phải đúng định dạng',
            'birthday.required' => 'Bạn phải chọn ngày sinh',
            'phone.required' => 'Số điện thoại không được bỏ trống',
            'phone.numeric' => 'Chỉ được nhập số',
            'phone.digits' => 'Số điện thoại phải là 10 số',
            'address.required' => 'Địa chỉ bắt buộc nhập',
            'address.min' => 'Địa chỉ tối thiểu 6 ký tự',
            'address.max' => 'Địa chỉ tối đa 32 ký tự',

        ];
    }
}
