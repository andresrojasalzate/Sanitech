<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolucionCambioMedicoRequest extends FormRequest
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
        $rules = [
            'action' => 'required|string|in:acceptar,rechazar',
        ];

        if ($this->input('action') === 'acceptar') {
            $rules['nuevoMedico'] = 'required|exists:medicos,id';
        } elseif ($this->input('action') === 'rechazar') {
            $rules['motivoRechazo'] = 'required|string';
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'action.required' => 'El campo acción es obligatorio.',
            'action.in' => 'El valor de acción no es válido.',
            'nuevoMedico.required' => 'El campo nuevo médico es obligatorio cuando se acepta la petición.',
            'nuevoMedico.exists' => 'El médico seleccionado no es válido.',
            'motivoRechazo.required' => 'El campo motivo de rechazo es obligatorio cuando se rechaza la petición.',
        ];
    }
}