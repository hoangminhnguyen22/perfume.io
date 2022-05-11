<?php

namespace App\Http\Requests\Login;

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
            'username'=>'required',
            'password'=>'required',
                     
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'tên đăng nhập không để trống',
            'password.required' => 'mật khẩu không để trống',
        ];
    }
}
