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
        'genre',
        'birth_date',
        'CIP',
        'adress',
        'city',
        'post_code',
        'familiar_contact',
        'user_id',
        'medico_id'
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
