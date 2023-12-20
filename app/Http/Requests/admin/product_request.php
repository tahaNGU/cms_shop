<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class product_request extends FormRequest
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
            'title_seo'=>'required',
            'url_seo'=>'required',
            'brand_id'=>'required',
            'is_active'=>'required',
            'tag_ids'=>'required',
            'description'=>'required',
            'pic'=>'required|image|max:2048',
            'parent_id'=>'required',
            'attribute_ids'=>'required',
            'attribute_ids.*'=>'required',
            'variation_values.*.*'=>'required',
            'variation_values'=>'required',
            'variation_values.price.*' => 'integer',
            'variation_values.quantity.*' => 'integer',
            'variation_values.discount.*' => 'integer',
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'url_seo' => str_replace(' ','-',$this->url_seo),
        ]);
    }
}
