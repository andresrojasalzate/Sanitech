<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Notificacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'asunto',
        'despcripcion',
        'tipo',
    ];

    public function citas(): BelongsTo
    {
        return $this->belongsTo(Cita::class);
    }
}
