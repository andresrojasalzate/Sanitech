<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resultado extends Model
{
    use HasFactory;

    protected $fillable = [
        'ruta'
    ];

    public function cita(): BelongsTo
    {
        return $this->belongsTo(Cita::class);
    }
}
