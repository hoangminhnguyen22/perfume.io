<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'account_id'=>'required',
            'title' => 'required|unique:blogs',
            'description'=>'required',
            'slug' => 'required',
            'file_upload'=>'required',            
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'tiêu đề không để trống',
            'account_id.required' => 'mã tài khoản không thể để trống',
            'description.required' => 'mô tả không để trống',
            'slug.required' => 'slug không thể để trống',
            'file_upload.required' => 'hình ảnh không để trống',
            'title.unique'=>'tiêu đề đã tồn tại'        
        ];
    }
}
