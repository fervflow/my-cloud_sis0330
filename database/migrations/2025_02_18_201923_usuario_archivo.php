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
        Schema::create('usuarios_archivos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_archivo');
            $table->unsignedBigInteger('id_carpeta')->nullable();
        
            $table->foreign('id_usuario')
                  ->references('id')
                  ->on('usuarios')
                  ->onDelete('cascade');
        
            $table->foreign('id_archivo')
                  ->references('id_archivo')
                  ->on('archivos')
                  ->onDelete('cascade');
        
            $table->foreign('id_carpeta')
                  ->references('id_carpeta')
                  ->on('carpetas')
                  ->onDelete('cascade');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('usuarios_archivos');

    }
};
