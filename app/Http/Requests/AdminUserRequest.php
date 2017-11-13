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
            'name'=>'required|max:255',
            'username'=>'required|unique:admin_users|max:255',
            'password'=>'required|confirmed|min:6|max:21',
            'password_confirmation'=>'required',
            'role_id'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'名称不能为空',
            'name.max'=>'名称长度不能超过255个字符',
            'username.required'=>'账号不能为空',
            'username.max'=>'账号长度不能超过255个字符',
            'username.unique'=>'账号已存在',
            'password.required'=>'密码不能为空',
            'password.min'=>'密码长度至少6位',
            'password.max'=>'密码长度不能超过21位',
            'role_id.required'=>'请选择角色',
            'password.confirmed'=>'密码不一致',
            'password_confirmation.required'=>'确认密码不能为空',
        ];
    }
}
