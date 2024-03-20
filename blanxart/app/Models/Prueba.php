<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prueba extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'video',
        'documento'
    ];

    public function citas(): HasMany
    {
        return $this->hasMany(Cita::class);
    }
}
