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
        
Schema::create('reservas_promociones', function (Blueprint $table) {
    $table->id('id_reservas_promociones');
    $table->foreignId('id_reserva')->constrained('reservas', 'id_reservas')->onDelete('cascade');
    $table->foreignId('id_promocion')->constrained('promociones', 'id_promociones')->onDelete('cascade');
    $table->timestamp('creado_es')->default(DB::raw('CURRENT_TIMESTAMP'));
    $table->timestamp('actualizado_es')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva_promociones');
    }
};
