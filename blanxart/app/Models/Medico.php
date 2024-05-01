<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_colegiado',
        'especialidad',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function paciente(): HasMany
    {
        return $this->hasMany(Paciente::class);
    }

    public static function getAllDoctors()
    {
        $medicos = DB::table('users')
            ->join('medicos', 'users.id', '=', 'medicos.user_id')
            ->get();

        return $medicos;
    }

    public static function getDoctorByName($doctorName)
    {

        Log::info('modelo usuarios');
        $resultados = DB::table('users')
            ->join('medicos', 'medicos.user_id', '=', 'users.id')
            ->where('name', 'ilike', '%' . $doctorName . '%')
            ->orWhere('lastName', 'ilike', '%' . $doctorName . '%')
            ->get();

        return $resultados;
    }



    public static function getAllMedicalAppointment($id)
    {
        $citasXMedico = DB::table('citas')
            ->join('medicos', 'medicos.id', '=', 'citas.medico_id')
            ->join('pacientes', 'pacientes.id', '=', 'citas.paciente_id')
            ->join('users', 'users.id', '=', 'pacientes.user_id')
            ->where('medicos.id', '=', $id)
            ->where('citas.accepted', '=', true)
            ->where('citas.done', '=', false)
            ->where('citas.date', '>=', date('Y-m-d'))
            ->select('users.name', 'users.lastName', 'citas.date', 'citas.time','citas.reason')
            ->orderBy('citas.date')
            ->orderBy('citas.time')
            ->paginate(10);

        foreach ($citasXMedico as $appointment) {
            $appointment->date = date('d/m/Y', strtotime($appointment->date));
        }
        return $citasXMedico;
    }
}
