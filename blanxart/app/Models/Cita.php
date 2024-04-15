<?php

namespace App\Models;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'nivel_emergencia',
        'aceptada',
        'realizada',
        'prueba_id'
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


    public static function getAllCitasByUserId($id)
    {
        $citas = DB::table('citas')
            ->join('pruebas', 'citas.prueba_id', '=', 'pruebas.id')
            ->select('citas.*', 'pruebas.*')
            ->where('citas.user_id', $id)
            ->get();

            return $citas;
    }

    public static function fillPDF($id){
        $cita = DB::table('citas')
        ->join('users','users.id','=','citas.user_id')
        ->select('users.name','users.lastName','users.dni','citas.date')
        ->where('citas.id', $id)
        ->get();

        return $cita;
    }
}
