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
        Schema::create('plan_usuario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->constrained('usuarios')->onDelete('cascade');
            $table->foreignId('id_plan')->constrained('plan')->onDelete('cascade');
            $table->date('fecha_pago');
            $table->date('fecha_renovacion');
            $table->boolean('esta_pagado')->default(false);
            $table->timestamps();

            // Ensure a user can only have one active plan
            $table->unique('id_usuario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_usuario');
    }
};
