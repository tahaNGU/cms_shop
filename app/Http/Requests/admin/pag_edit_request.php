<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class pag_edit_request extends FormRequest
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
            'url_seo'=>'required|unique:pages,url_seo,'.$this->id,
            'title'=>'required',
            'pic'=>'required|image|max:2048',
            'alt_pic'=>'required',
            'long_note'=>'required',
            'video'=>'required|mimes:mp4,mov,ogg,qt|max:20000',
            'address'=>'required',

        ];
        if(!empty($this->upload_value_pic)){
            unset($rules["pic"]);
        }
        if(!empty($this->upload_value_video)){
            unset($rules["video"]);
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
