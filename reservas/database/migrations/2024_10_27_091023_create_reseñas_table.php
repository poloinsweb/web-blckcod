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
        Schema::create('reseñas', function (Blueprint $table) {
            $table->id('id_reseñas');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuarios')->onDelete('cascade');
            $table->foreignId('id_habitacion')->constrained('habitaciones', 'id_habitaciones')->onDelete('cascade');
            $table->text('comentario');
            $table->integer('puntuacion');
            $table->timestamp('creado_es')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('actualizado_es')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
          });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reseñas');
    }
};
