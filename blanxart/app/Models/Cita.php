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
        'date',
        'emergency_level',
        'accepted',
        'reason',
        'done',
        'time',
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
            ->leftJoin('pruebas', 'citas.prueba_id', '=', 'pruebas.id')
            ->select('citas.*', 'pruebas.name', 'pruebas.video', 'pruebas.document')
            ->where('citas.paciente_id', $id)
            ->get();

        return $citas;
    }

    public static function fillPDF($idCita)
    {
        $cita = DB::table('citas')
            ->join('users', 'users.id', '=', 'citas.paciente_id')
            ->select('users.name', 'users.lastName', 'users.dni', 'citas.date','citas.time')
            ->where('citas.id', $idCita)
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
            ->havingRaw('COUNT(*) >= 1')
            ->orderBy('date')
            ->get()
            ->map(function ($cita) {
                return date('Y-m-d', strtotime($cita->date));
            })
            ->toJson();

        return $diasNoDisponibles;
    }

    public static function getHorasDisponibles($medico_id, $fecha) 
    {
        $horasNoDisponibles = DB::table('citas')
            ->select('time')
            ->where('medico_id', $medico_id)
            ->whereDate('date', $fecha)
            ->groupBy('time')
            ->get();

            $horasPosibles = [
                '08:00', '09:00', '10:00', '11:00',
                '12:00', '13:00', '14:00', '15:00', '16:00'
            ];

            $horasDisponibles = array_diff($horasPosibles, $horasNoDisponibles->pluck('time')->toArray());

            // return json_encode($horasDisponibles);
            return $horasDisponibles;
    }

    public static function getCitasSinAsignar()
    {
        $citas = DB::table('citas')
            ->select(
                'citas.id',
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
            ->leftJoin('pruebas', 'pruebas.id', '=', 'citas.prueba_id')
            ->join('users', 'users.id', '=', 'pacientes.user_id')
            ->whereNull('citas.date')
            ->orderBy('citas.emergency_level', 'desc')
            ->get();

            return $citas;
    }

    public static function getCitasRechazadas()
    {
        $citas = DB::table('citas')
            ->select(
                'citas.id',
                'citas.emergency_level',
                'citas.date',
                'citas.time',
                'users.name',
                'users.lastName',
                'pacientes.genre',
                'pacientes.birth_date',
                'users.dni',
                'pacientes.CIP',
                'pruebas.name as nombrePrueba'
            )
            ->join('pacientes', 'pacientes.id', '=', 'citas.paciente_id')
            ->leftJoin('pruebas', 'pruebas.id', '=', 'citas.prueba_id')
            ->join('users', 'users.id', '=', 'pacientes.user_id')
            ->where('citas.accepted', '=', false)
            ->orderBy('citas.emergency_level', 'desc')
            ->get();

            return $citas;
    }
}
