<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitaRequest extends FormRequest
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
            'prueba_id' => 'required',
            'emergency_level' => 'required',
            'user_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'prueba_id.required' => 'Escull una proba per a la cita.',
            'emergency_level.required' => 'Escull el nivell de emergència de la cita.',
            'user_id.required' => 'Fallo al seleccionar el pacinte.',
        ];
    }
}
