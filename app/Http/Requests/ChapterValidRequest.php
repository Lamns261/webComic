<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChapterValidRequest extends FormRequest
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
            'name' => 'required|unique:chapters',
            'content' => 'required',
            'comic_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bắt buộc nhập trường này',
            'name.unique' => 'Tên chapter đã tồn tại',
            'content.required' => 'Bắt buộc nhập trường này',
            'comic_id.required' => 'Bắt buộc nhập trường này',
        ];
    }
}
