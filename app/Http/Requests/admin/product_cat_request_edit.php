<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class product_cat_request_edit extends FormRequest
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
            'title'=>'required',
            'parent_id'=>'required',
            'attributes'=>'required',
            'compare'=>'required',
            'variation'=>'required',
            'description'=>'required',
            'title_seo'=>'required',
//            'icon'=>'required|image',
            'url_seo'=>'required|unique:product_cats,url_seo,'.$this->id,
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'url_seo' => str_replace(' ','-',$this->url_seo),
        ]);
    }
}
