<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePropietarioRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'documento' => 'required|integer|unique:propietarios,documento,' . $this->route('propietario'),
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:propietarios,email,' . $this->route('propietario'),
            'direccion' => 'nullable|string|max:255',
            'ciudad' => 'required|string|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'documento.required' => 'El número de documento es obligatorio.',
            'documento.integer' => 'El número de documento debe ser un entero.',
            'documento.unique' => 'El número de documento ya está registrado.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',
            'email.unique' => 'El correo electrónico ya está registrado.',
            'ciudad.required' => 'La ciudad es obligatoria.',
        ];
    }
}
