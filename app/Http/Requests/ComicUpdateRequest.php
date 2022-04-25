<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicUpdateRequest extends FormRequest
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
            'name' => 'required|max:255',
            'summary' => 'required',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bắt buộc nhập trường này',
            'name.max' => 'Trường vượt quá ký tự cho phép',
            'summary.required' => 'Bắt buộc nhập trường này',
            'category_id.required' => 'Bắt buộc nhập trường này',
            'image.image' => 'Trường này bắt buộc là ảnh',
            'image.mimes' => 'Ảnh không hỗ trợ',
            'image.max' => 'Ảnh dung lượng quá lớn',
        ];
    }
}
