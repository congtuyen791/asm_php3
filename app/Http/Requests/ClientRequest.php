<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'title' => 'required|min:6|max:32',
            'content' => 'required|min:10|max:100',
            
        ];
    } 
    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề bắt buộc nhập',
            'title.min' => 'Tiêu đề tối thiểu 6 ký tự',
            'title.max' => 'Tiêu đề tối đa 32 ký tự',
            'content.required' => 'Tiêu đề bắt buộc nhập',
            'content.min' => 'Tiêu đề tối thiểu 10 ký tự',
            'content.max' => 'Tiêu đề tối đa 100 ký tự',
        ];
    }
}
