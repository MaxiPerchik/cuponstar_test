<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TareasStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required',
            'descripcion' => 'required',
            'estado_id' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'titulo.required' => 'el campo :attribute  es requerido',
            'descripcion.required' => 'el campo :attribute  es requerido',
            'estado_id.required' => 'el campo :attribute  es requerido',
        ];
    }
}
