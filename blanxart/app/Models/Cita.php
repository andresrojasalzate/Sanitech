<?php

namespace App\Models;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'emergency_level',
        'aceptada',
        'done',
        'prueba_id',
        'user_id',
        'paciente_id',
        'medico_id'
    ];

    public function prueba(): BelongsTo
    {
        return $this->belongsTo(Prueba::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function resultado(): HasOne
    {
        return $this->hasOne(Resultado::class);
    }

    public function notificacion(): HasMany
    {
        return $this->hasMany(Notificacion::class);
    }

    public static function getAllCitasByUserId($id)
    {
        $citas = DB::table('citas')
            ->join('pruebas', 'citas.prueba_id', '=', 'pruebas.id')
            ->select('citas.*', 'pruebas.name', 'pruebas.video', 'pruebas.document')
            ->where('citas.paciente_id', $id)
            ->get();

        return $citas;
    }

    public static function fillPDF($id)
    {
        dd($id); //recibo id = 26, que es el id del usuario, pero tendria que recibir el id 1 (que es ahora como estoy logueado) de la cita que le pertenece al usuario 26
        $cita = DB::table('citas')
            ->join('users', 'users.id', '=', 'citas.user_id')
            ->select('users.name', 'users.lastName', 'users.dni', 'citas.date')
            ->where('citas.id', $id)
            ->get();

        return $cita;
    }

    public static function getDiasNoDisponibles($medico_id)
    {
        $diasNoDisponibles = DB::table('citas')
            ->select('date')
            ->where('date', '>=', now()->toDateString())
            ->where('medico_id', $medico_id)
            ->groupBy('date')
            ->havingRaw('COUNT(*) >= 8')
            ->orderBy('date')
            ->get()
            ->map(function ($cita) {
                return date('Y-m-d', strtotime($cita->date));
            })
            ->toJson();

        return $diasNoDisponibles;
    }

    public static function getCitasSinAsignar()
    {
        $citas = DB::table('citas')
            ->select(
                'citas.emergency_level',
                'users.name',
                'users.lastName',
                'pacientes.genre',
                'pacientes.birth_date',
                'users.dni',
                'pacientes.CIP',
                'pruebas.name as nombrePrueba'
            )
            ->join('pacientes', 'pacientes.id', '=', 'citas.paciente_id')
            ->join('pruebas', 'pruebas.id', '=', 'citas.prueba_id')
            ->join('users', 'users.id', '=', 'pacientes.user_id')
            ->whereNull('citas.date')
            ->orderBy('citas.emergency_level', 'desc')
            ->get();

            return $citas;
    }
}
