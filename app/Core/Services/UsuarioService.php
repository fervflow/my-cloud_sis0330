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

    public function changeRole(string $id, string $rol)
    {
        $usuario = UsuarioModel::find($id);

        if (!$usuario) {
            return null;
        }

        $usuario->rol = $rol;
        $usuario->save();

        return $usuario;
    }

    public function edit()
    {
    }

}
