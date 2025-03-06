<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('compartir_archivos', function (Blueprint $table) {
            // Agregar la columna 'id_usuario_destino'
            $table->unsignedBigInteger('id_usuario_destino')->after('id_usuario');

            // Definir la relación con la tabla 'usuarios' para esta nueva columna
            $table->foreign('id_usuario_destino')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('compartir_archivos', function (Blueprint $table) {
            // Eliminar la columna 'id_usuario_destino'
            $table->dropForeign(['id_usuario_destino']);
            $table->dropColumn('id_usuario_destino');
        });
    }
};
