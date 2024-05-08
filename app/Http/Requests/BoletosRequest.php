<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoletosRequest extends FormRequest
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
            'folio' => 'required',
            'folio' => 'required',
            'nombre' => ['required', 'regex:/^[a-zA-ZÀ-ÿ\s]+$/'],
            'apellido_paterno' => ['required', 'regex:/^[a-zA-ZÀ-ÿ\s]+$/'],
            'apellido_materno' => ['required', 'regex:/^[a-zA-ZÀ-ÿ\s]+$/'],
            'edad' => 'required|numeric|max:120',
            'sexo' => 'in:Masculino,Femenino',
            'estado' => ['required', 'regex:/^[a-zA-ZÀ-ÿ\s]+$/'],
            'ciudad' => ['required', 'regex:/^[a-zA-ZÀ-ÿ\s]+$/'],
            'telefono' => 'required|numeric',
            'correo' => 'required|email',
            'club' => 'required',
            'talla' => 'required',
            'prueba' => 'required',            
        ];
    }

    public function messages()
    {
        return[            
            'folio.required' => 'El campo folio es obligatorio',
            'folio.required' => 'El campo precio es obligatorio',
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.regex' => 'El campo nombre solo debe contener letras y espacios',
            'apellido_paterno.required' => 'El campo apellido paterno es obligatorio',
            'apellido_paterno.regex' => 'El campo apellido paterno solo debe contener letras y espacios',
            'apellido_materno.required' => 'El campo apellido materno es obligatorio.',
            'apellido_materno.regex' => 'El campo apellido materno solo debe contener letras y espacios',
            'edad.required' => 'El campo edad es obligatorio',
            'edad.numeric' => 'El campo edad debe ser un número.',
            'edad.max' => 'El campo edad no puede ser mayor que :max',
            'sexo.in' => 'El campo sexo debe ser Masculino o Femenino',
            'estado.required' => 'El campo estado es obligatorio',
            'estado.regex' => 'El campo estado solo debe contener letras y espacios',
            'ciudad.required' => 'El campo ciudad es obligatorio',
            'ciudad.regex' => 'El campo ciudad solo debe contener letras y espacios',
            'telefono.required' => 'El campo teléfono es obligatorio',
            'telefono.numeric' => 'El campo teléfono debe ser un número',
            'correo.required' => 'El campo correo es obligatorio',
            'correo.email' => 'El campo correo debe ser una dirección de correo válida',
            'club.required' => 'El campo club es obligatorio',
            'talla.required' => 'El campo talla es obligatorio',
            'prueba.required' => 'El campo prueba es obligatorio',            
        ];
    }
}
