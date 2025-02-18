<?php

namespace App\Services;

use App\Models\UsuarioModel;

class UsuarioService
{
    public function getAllUsers()
    {
        return UsuarioModel::all();
    }

    public function findUserByEmail(string $email)
    {
        return UsuarioModel::where('correo', $email)->first();
    }

    public function createUser(array $data)
    {
        return UsuarioModel::create($data);
    }
}