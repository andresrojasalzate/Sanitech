<?php

namespace App\Models;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function medico(): BelongsTo
    {
        return $this->belongsTo(Medico::class);
    }

    public function resultado(): HasMany
    {
        return $this->hasMany(Resultado::class);
    }

    public function notificacionPaciente(): HasMany
    {
        return $this->hasMany(NotificacionPaciente::class);
    }

    public static function getPacientIdByUserId($id)
    {
        try {
            Log::info('Llamada al metodo Paciente.getPacienteIdByUserId id= ' . $id);
            $idPaciente = Paciente::where('user_id', $id)->get();

            return $idPaciente;
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
