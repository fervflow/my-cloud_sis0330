<?php
namespace App\Core\Services;
use App\Core\Usuario;
use App\Models\UsuarioModel;

class UsuarioService
{

    public function add(Usuario $usuario)
    {
        return UsuarioModel::create($usuario->toArray());
    }

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

    public function edit()
    {
    }

}
