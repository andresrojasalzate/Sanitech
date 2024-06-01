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
            'idPaciente' => 'required'
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
            'action.required' => 'El camp action és obligatori.',
            'action.in' => "El valor d' acció no és vàlid.",
            'nuevoMedico.required' => "El camp nou mèdic és obligatori quan s' accepta la petició.",
            'nuevoMedico.exists' => 'El metge seleccionat no és vàlid.',
            'motivoRechazo.required' => 'El camp motiu de rebuig és obligatori quan es rebutja la petició.',
        ];
    }
}