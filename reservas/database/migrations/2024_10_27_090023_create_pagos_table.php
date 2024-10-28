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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('id_pagos');
            $table->foreignId('id_reserva')->constrained('reservas', 'id_reservas')->onDelete('cascade');
            $table->decimal('monto', 8, 2);
            $table->enum('metodo_pago', ['tarjeta', 'Yape', 'Plin', 'transferencia']);
            $table->enum('estado_pago', ['completo', 'incompleto']);
            $table->timestamp('creado_es')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('actualizado_es')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
