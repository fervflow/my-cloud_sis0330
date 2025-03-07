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

    public function searchUsuarios(string $searchTerm)
    {
        $searchTerm = strtolower($searchTerm);
        $usuarios = UsuarioModel::whereRaw('LOWER(nombres) LIKE ?', ["%$searchTerm%"])
            ->orWhereRaw('LOWER(apellidos) LIKE ?', ["%$searchTerm%"])
            ->orWhereRaw('LOWER(correo) LIKE ?', ["%$searchTerm%"])
            ->get();

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

        $usuarioModel->update($data);
        return UsuarioDTO::fromModel($usuarioModel);
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

    public function updateEspacioTotal(int $usuarioId, int $almacenamiento)
    {
        $usuario = UsuarioModel::find($usuarioId);

        if (!$usuario) {
            return false;
        }

        $usuario->espacio_total = $almacenamiento;
        $usuario->save();

        return true;
    }
    public function updateEspacioDisponible($usuarioId, $nuevoEspacioDisponible)
    {
        $usuario = UsuarioModel::findOrFail($usuarioId);
        $usuario->espacio_disponible = $nuevoEspacioDisponible;
        $usuario->save();
    }


    public function editUser(int $id, array $data)
    {
        $usuarioModel = UsuarioModel::find($id);

        if (!$usuarioModel) {
            return false;
        }

        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        foreach ($data as $key => $value) {
            if (empty($value)) {
                unset($data[$key]);
            }
        }
        // Actualizar el usuario
        try {
            $usuarioModel->update($data);
        } catch (\Exception $e) {
            return false;
        }

        return UsuarioDTO::fromModel($usuarioModel);
    }
}
