<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserRequest extends FormRequest
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
     * @return array
     *
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'username'=>'required',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
            'role_id'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'名称不能为空',
            'username.required'=>'账号不能为空',
            'password.required'=>'密码不能为空',
            'role_id.required'=>'请选择角色',
            'password.confirmed'=>'密码不一致',
            'password_confirmation.required'=>'确认密码不能为空',
        ];
    }
}
