<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CuponRequest extends FormRequest
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
            'codigo_cupon' => 'required|max:6|min:4|',
            'porcentaje' => 'required|max:2|min:1|numeric',
        ];
    }

    public function messages() : array {
        return[
            'codigo_cupon.required' => 'Obligado',
            'codigo_cupon.max' => 'Debe ingresar maximo 6 letras',
            'porcentaje.required' => 'Maximo perimitido es de 99%',

        ];
    }
}
