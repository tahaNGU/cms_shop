<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class brand_request extends FormRequest
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
        return [
            'title_seo'=>'required',
            'url_seo'=>'required|unique:brands,url_seo',
            'title'=>'required',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge(['url_seo'=>str_replace(' ','-',$this->url_seo)]);
    }
}
