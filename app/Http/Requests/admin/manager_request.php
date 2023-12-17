<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class manager_request extends FormRequest
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
            'name'=>'required',
            'lastname'=>'required',
            'date_birth'=>'required|regex:/^\d{2}\/\d{2}\/\d{4}$/',
            'email'=>'required|email',
            'mobile'=>'required|regex:/^09[0|1|2|3][0-9]{8}$/',
            'user_name'=>'required',
            'password'=>'required',

        ];
    }
}
