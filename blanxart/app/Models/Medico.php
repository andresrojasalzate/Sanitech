<?php

namespace App\Models;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        try {
            Log::info('Llamada al método Medico.getAllDoctors');

            $medicos = DB::table('users')
                ->join('medicos', 'users.id', '=', 'medicos.user_id')
                ->get();

            return $medicos;
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public static function getDoctorByName($doctorName)
    {
        try {
            Log::info('Llamada al método Medico.getDoctorByName $doctorName = ' . $doctorName);

            $resultados = DB::table('users')
                ->join('medicos', 'medicos.user_id', '=', 'users.id')
                ->where('name', 'ilike', '%' . $doctorName . '%')
                ->orWhere('lastName', 'ilike', '%' . $doctorName . '%')
                ->get();

            return $resultados;
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }



    public static function getAllMedicalAppointment($id)
    {

        try {

            Log::info('Llamada al método Medico.getAllMedicalAppointment $id = ' . $id);

            $citasXMedico = DB::table('citas')
                ->join('medicos', 'medicos.id', '=', 'citas.medico_id')
                ->join('pacientes', 'pacientes.id', '=', 'citas.paciente_id')
                ->join('users', 'users.id', '=', 'pacientes.user_id')
                ->where('medicos.id', '=', $id)
                ->where('citas.accepted', '=', true)
                ->where('citas.done', '=', false)
                ->where('citas.date', '>=', date('Y-m-d'))
                ->select('users.name', 'users.lastName', 'citas.date', 'citas.time', 'citas.reason')
                ->orderBy('citas.date')
                ->orderBy('citas.time')
                ->paginate(6);

            foreach ($citasXMedico as $appointment) {
                $appointment->date = date('d/m/Y', strtotime($appointment->date));
            }
            return $citasXMedico;
            
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
