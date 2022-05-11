<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|unique:categories,name,'.request()->id,            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'tên danh mục không để trống',
            'name.unique'=>'tên danh mục đã tồn tại'
        ];
    }
}
