<?php

namespace App\Models;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resultado extends Model
{
    use HasFactory;

    protected $fillable = [
        'ruta'
    ];

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(Paciente::class);
    }

    public static function getMedicalResults($id)
    {
        try {
            Log::info('Llamada al metodo Resultado.getMedicalResults id = ' . $id);

            $resultados = DB::table('resultados')
                ->join('pacientes', 'pacientes.id', '=', 'resultados.paciente_id')
                ->join('users', 'users.id', '=', 'pacientes.user_id')
                ->where('users.id', '=', $id)
                ->paginate(10);

            return $resultados;
        } catch (Exception $e) {

            Log::error($e->getMessage());
        }
    }
}
