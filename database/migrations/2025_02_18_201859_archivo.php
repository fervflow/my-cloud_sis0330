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
        //
        Schema::create('archivos', function (Blueprint $table) {
            $table->id('id_archivo');
            $table->string('nombre');
            $table->string('ruta');
            $table->integer('tamaño');
            $table->string('tipo');
            $table->date('fecha_expiracion')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('archivos');

    }
};
