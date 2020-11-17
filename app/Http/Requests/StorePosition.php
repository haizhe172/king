<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StorePosition extends FormRequest
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
            'position_name' =>[
                'required',Rule::unique('position')->ignore(request()->position_id,'position_id')
            ],
            'position_width' => 'required',
            'position_width' => 'required',
            'position_height' => 'required',
            'position_desc' => 'required',
            'template' => 'required'
        ];
    }
    
    public function messages(){
        return [
            'position_name.required' => '广告位名称不能为空',
            'position_name.unique' => '广告位名称已存在',
            'position_width.required' => '宽度不能为空',
            'position_height.required' => '高度不能为空',
            'position_desc.required' => '广告描述不能为空',
            'template.required' => '模板类型不能为空'
        ];
    }
}
