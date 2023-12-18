<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class product_request_edit extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules= [
            'title'=>'required',
            'title_seo'=>'required',
            'url_seo'=>'required|unique:products,url_seo,'.$this->id,
            'brand_id'=>'required',
            'is_active'=>'required',
            'tag_ids'=>'required',
            'description'=>'required',
            'pic'=>'required|image|max:2048',
        ];
        if(!empty($this->upload_value_pic)){
            unset($rules["pic"]);
        }
        return $rules;
    }
}
