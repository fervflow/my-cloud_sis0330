<?php

namespace App\Services;

use App\Models\Usuario;

class UsuarioService
{
    public function getAllUsers()
    {
        return Usuario::all();
    }

    public function findUserByEmail(string $email)
    {
        return Usuario::where('correo', $email)->first();
    }

    public function createUser(array $data)
    {
        return Usuario::create($data);
    }
}
