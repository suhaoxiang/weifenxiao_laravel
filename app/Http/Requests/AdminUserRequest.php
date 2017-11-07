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
     */
     *
    public function rules()
    {
        return [
            'geetest_challenge' => 'required|geetest'
        ];
    }

    public function messages()
    {
        return [
            'geetest_challenge.required'=>'请输入验证码',
            'geetest_challenge.geetest' => config('geetest.server_fail_alert')
        ];
    }
}
