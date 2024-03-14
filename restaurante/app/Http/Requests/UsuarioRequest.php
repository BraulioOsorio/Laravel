<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'Fullname' => 'required|max:255|min:15',
            'correo' => 'required|max:255|min:10',
            'pass' => 'required|max:255|min:6',
        ];
    }

    public function messages() : array {
        return[
            'Fullname.required' => 'Este campo es obligatorio',
            'correo.required' => 'Este campo es obligatorio',
            'pass.required' => 'Este campo es obligatorio',

            'pass.min' => 'Tamaño imnapropiado',
            'correo.min' => 'Tamaño imnapropiado',
            'Fullname.min' => 'Tamaño imnapropiado',
        ];
    }
}
