<?php

namespace App\Http\Requests\Product;

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
            'name' => 'required|unique:products',
            'slug' => 'required',
            'file_upload'=>'required',
            'quantity'=>'required', 
            'price'=>'required', 
            'description'=>'required', 
            'sale_id'=>'required',
            'category_id'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'tên sản phẩm không để trống',
            'price.required' => 'mã tài khoản không thể để trống',
            'description.required' => 'mô tả không để trống',
            'slug.required' => 'slug không thể để trống',
            'file_upload.required' => 'hình ảnh không để trống',
            'name.unique'=>'tên sản phẩm đã tồn tại',
            'quantity.required' => 'số lượng không để trống',
            'category_id.required' => 'vui lòng chọn danh mục cho sản phẩm',
            'sale_id.required' => 'vui lòng chọn mã giảm giá cho sản phẩm',
        ];
    }
}
