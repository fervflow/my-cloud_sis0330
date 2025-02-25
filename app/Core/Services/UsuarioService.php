<?php
namespace App\Core\Services;

use App\Core\Dtos\UsuarioDTO;
use App\Models\UsuarioModel;

class UsuarioService
{
    public function getUsuarios()
    {
        $usuarios = UsuarioModel::all();

        return $usuarios->map(function ($usuario) {
            return UsuarioDTO::fromModel($usuario);
        });
    }

    public function createUser(UsuarioDTO $usuarioDTO): UsuarioDTO
    {
        $usuarioModel = new UsuarioModel();
        $usuarioModel->fill($usuarioDTO->toArray());
        $usuarioModel->save();

        return UsuarioDTO::fromModel($usuarioModel);
    }

    public function updateUser(int $id, array $data)
    {
        $usuarioModel = UsuarioModel::find($id);
        if (!$usuarioModel) {
            return false;
        }

        $usuarioModel->update([
            'nombres' => $data['nombres'],
            'apellidos' => $data['apellidos'],
            'correo' => $data['correo'],
            'rol' => $data['rol'],
            'espacio_total' => $data['espacio_total'],
        ]);

        $usuarioModel->update($data);
        return new UsuarioDTO(
            '',
            $usuarioModel->nombres,
            $usuarioModel->apellidos,
            $usuarioModel->correo,
            '',
            $usuarioModel->rol,
            $usuarioModel->espacio_disponible,
            $usuarioModel->espacio_total
        );
    }

    public function findUserByEmail(string $email)
    {
        $usuario = UsuarioModel::where('correo', $email)->first();

        if ($usuario) {
            return UsuarioDTO::fromModel($usuario);
        } else {
            return null;
        }
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

    public function deleteUser(int $id)
    {
        $usuarioModel = UsuarioModel::find($id);
        if (!$usuarioModel) {
            return false;
        }
        return $usuarioModel->delete();
    }

}
