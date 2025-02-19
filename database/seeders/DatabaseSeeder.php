<?php

namespace Database\Seeders;

use App\Models\UsuarioModel;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        UsuarioModel::factory()->create([
            'nombre' => 'Juan',
            'apellidos' => 'Perez',
            'correo' => 'test@example.com',
            'password' => 'juan123'
        ]);
    }
}
