<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class article_request_edit extends FormRequest
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
            'title_seo'=>'required',
            'url_seo'=>'required|unique:articles,url_seo,'.$this->id,
            'title'=>'required',
            'cat_id'=>'required',
            'show_time_date'=>'required|regex:/^\d{2}\/\d{2}\/\d{4}$/',
            'pic'=>'required|image|max:2048',
            'alt_pic'=>'required',
            'short_note'=>'required',
            'long_note'=>'required',
        ];
        if(!empty($this->upload_value_pic)){
            unset($rules["pic"]);
        }
        return $rules;
    }
    protected function prepareForValidation(): void
    {
        $this->merge([
            'url_seo' => str_replace(' ','-',$this->url_seo),
        ]);
    }
}
