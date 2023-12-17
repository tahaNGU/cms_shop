<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class banner_edit_request extends FormRequest
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
        $rules=[
            'title'=>'required',
            'place'=>'required',
            'kind_open'=>'required',
            'address'=>'required',
            'pic'=>'required|image',

        ];
        if(!empty($this->upload_value_pic)){
           unset($rules["pic"]);
        }
        return $rules;
    }
}
