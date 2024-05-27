<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NotificacionPaciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'descripcion',
        'tipo',
        'vista',
        'paciente_id'
    ];

    public function pacientes(): BelongsTo
    {
        return $this->belongsTo(Paciente::class);
    }
}
