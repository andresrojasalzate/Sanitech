<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'telefono',
        'correo',
        'tarjeta_sanitaria',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function medico() : BelongsTo
    {
        return $this->belongsTo(Medico::class);  
    }

    public function resultado() : HasMany 
    {
        return $this->hasMany(Resultado::class);  
    }

}
