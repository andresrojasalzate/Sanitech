<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CambiarMedicoRequest extends FormRequest
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
            'reason' => 'required',
            'paciente_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'reason.required' => 'Especificar el motiu del canvi és obligatori',
            'paciente_id.required' => 'Escull una proba per a la cita.'
        ];
    }
}
