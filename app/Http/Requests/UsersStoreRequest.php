<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UsersStoreRequest extends FormRequest
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
            'name'=>'required|min:4',
            'email'=>'required|unique:users|email:rfc,dns',
            'password'=>['required', 'confirmed', password::defaults()],
            'password_confirmation' => 'required',
            'created_at'=>'nullable',
        ];
    }

    public function messages()
    {
        return[
          'date'=>"The date can't be left blank"
        ];

    }
}
