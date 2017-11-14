<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        switch ($this->method()){
            case 'POST':
            {
                return [
                    'name'=>'required|unique:roles|max:255',
                    'display_name'=>'required|max:255',
                    'description'=>'sometimes|max:255',
                ];
            }
            case 'PUT':
            {
                return [
                    'name'=>'required|unique:roles,name,'.$this->segment(2).'|max:255',
                    'display_name'=>'required|max:255',
                    'description'=>'sometimes|max:255',
                ];
            }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'name.required'=>'系统角色名称不能为空',
            'name.unique'=>'系统角色名称已存在',
            'display_name.required'=>'角色名称不能为空',
            'name.max'=>'系统角色名称长度不能超过255',
            'display_name.max'=>'角色名称长度不能超过255',
            'description.max'=>'角色简介长度不能超过255',
        ];
    }
}
