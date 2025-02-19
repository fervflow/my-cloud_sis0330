<?php

namespace App\Services;

use App\Models\UsuarioModel;

class UsuarioService
{
    public function getUsuarios()
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

    public function edit(){}
}
