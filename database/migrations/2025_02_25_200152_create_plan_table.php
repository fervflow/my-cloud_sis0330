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
        Schema::create('plan', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->decimal('precio', 8, 2);
            $table->decimal('almacenamiento', 8, 2);
            $table->integer('periodo_meses');
            $table->boolean('esta_activo')->default(true);
            $table->timestamps(); // Adds created_at and updated_at
            $table->softDeletes(); // Enables soft deletes (optional)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan');
    }
};
