<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdministradoresRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'regex:/^[a-zA-ZÀ-ÿ\s]+$/'],
            'email' => 'required|email',
            'rol' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es requerido',
            'name.regex' => 'El campo nombre solo debe contener letras y espacios',
            'email.required' => 'El campo correo es requerido',
            'email.email' => 'El campo correo debe ser una dirección de correo válida',
            'rol.required' => 'El campo rol es requerido',
            'password.required' => 'El campo contraseña es requerido',
            'password_confirmation.required' => 'Por favor, confirma la contraseña',
            'password_confirmation.same' => 'Las contraseñas no coinciden',
        ];
    }
}
