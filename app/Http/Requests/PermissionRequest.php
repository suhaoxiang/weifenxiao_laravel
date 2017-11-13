<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'name'=>"required|max:255",
            'display_name'=>'sometimes|max:255',
            'discription'=>'sometimes|max:255'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'权限规则不能为空',
            'name.max'=>'权限规则长度不能超过255',
            'display_name.max'=>'权限名称长度不能超过255',
            'discription.max'=>'权限简介长度不能超过255',
        ];
    }
}
