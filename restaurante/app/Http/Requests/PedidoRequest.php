<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoRequest extends FormRequest
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
            'nombre' => 'required|max:255|min:5',
            'descripcion' => 'required|max:255|min:5',
            'telefono' => 'required|min:8|numeric',
            'direccion' => 'required|max:255|min:10',
            'hora' => 'required',
            'cupon_id' => 'required',
        ];
    }

    public function messages() : array {
        return[
            'nombre.required' => 'Debe ingresar mas de 999',
            'telefono.max' => 'Debe ingresar mas de 999',
            'direccion.required' => 'Tamaño imnapropiado',
            'hora.required' => 'Ponga una hora',
            'cupon_id.required' => 'Tamaño imnapropiado',
            'descripcion.required' => 'Obligatorio',
        ];
        
    }
}
