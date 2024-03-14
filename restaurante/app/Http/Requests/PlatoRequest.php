<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlatoRequest extends FormRequest
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
            'costo' => 'required|max:255|min:4|numeric',
            'precio' => 'required|max:25|min:4|numeric',
            'nombre' => 'required|max:255|min:4',
        ];
    }

    public function messages() : array {
        return[
            'costo.required' => 'Debe ingresar mas de 999',
            'precio.required' => 'Debe ingresar mas de 999',
            'nombre.required' => 'Tamaño imnapropiado',
        ];
    }
}
