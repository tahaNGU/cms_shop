<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class menu_request extends FormRequest
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
            'address'=>'required',
            'menu_type'=>'required',
            'kind_open'=>'required',
            'state'=>'required',
        ];
    }
}
