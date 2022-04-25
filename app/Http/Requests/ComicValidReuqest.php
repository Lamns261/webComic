<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicValidReuqest extends FormRequest
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
            'name' => 'required|unique:comics|max:255',
            'summary' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bắt buộc nhập trường này',
            'name.unique' => 'Danh mục đã tồn tại',
            'name.max' => 'Trường vượt quá ký tự cho phép',
            'summary.required' => 'Bắt buộc nhập trường này',
            'category_id.required' => 'Bắt buộc nhập trường này',
            'image.required' => 'Bắt buộc nhập trường này',
            'image.image' => 'Trường này bắt buộc là ảnh',
            'image.mimes' => 'Ảnh không hỗ trợ',
            'image.max' => 'Ảnh dung lượng quá lớn',
        ];
    }
}
