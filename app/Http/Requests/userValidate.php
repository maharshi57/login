<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userValidate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|max:20',
            'email'=>'required|email',
            'password'=>'required|confirmed',
            'age'=>'required',
            'position'=>'required',

        ];
    }
}
