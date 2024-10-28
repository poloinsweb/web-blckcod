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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id('id_reservas');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuarios')->onDelete('cascade');
            $table->foreignId('id_habitacion')->constrained('habitaciones', 'id_habitaciones')->onDelete('cascade');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->enum('estado', ['confirmada', 'cancelada']);
            $table->timestamp('creado_es')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('actualizado_es')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
