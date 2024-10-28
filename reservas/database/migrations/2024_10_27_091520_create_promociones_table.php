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
        Schema::create('promociones', function (Blueprint $table) {
            $table->id('id_promociones');
            $table->string('nombre', 100);
            $table->text('descripcion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->decimal('descuento', 5, 2);
            $table->timestamp('creado_es')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('actualizado_es')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promociones');
    }
};
