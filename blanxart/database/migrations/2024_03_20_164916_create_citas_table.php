<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->time('hour_entry')->nullable();
            $table->time('hour_departure')->nullable();
            $table->integer('emergency_level');
            $table->boolean('accepted')->nullable();
            $table->boolean('done');
            $table->foreignId('prueba_id')->nullable()->references('id')->on('pruebas')->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignId('paciente_id')->references('id')->on('pacientes')->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignId('medico_id')->nullable()->references('id')->on('medicos')->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
