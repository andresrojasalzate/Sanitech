<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'prueba_id' => [
                'nullable',
                Rule::requiredIf(function () {
                    return $this->input('citaPrueba') === 'Si';
                })
            ],
            'emergency_level' => 'required',
            'paciente_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'prueba_id.required' => 'Escull una proba per a la cita.',
            'emergency_level.required' => 'Escull el nivell de emergència de la cita.',
            'paciente_id.required' => 'Error al seleccionar el pacinte.',
        ];
    }
}
