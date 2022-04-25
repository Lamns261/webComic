<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorValidRequest extends FormRequest
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
            'name' => 'required|unique:authors',
            'info' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bắt buộc nhập trường này',
            'name.unique' => 'Tên tác giả đã tồn tại',
            'info.required' => 'Bắt buộc nhập trường này',
        ];
    }
}
