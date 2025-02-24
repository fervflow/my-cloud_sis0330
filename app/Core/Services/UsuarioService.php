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

    public function createUser(array $data)
    {
        $usuario = new Usuario(
            '',
            $data['nombres'],
            $data['apellidos'],
            $data['correo'],
            '',
            $data['rol'] ?? 'usuario',
            $data['espacio_disponible'] ?? 1
        );

        $usuarioModel = UsuarioModel::create([
            'nombres' => $usuario->getNombres(),
            'apellidos' => $usuario->getApellidos(),
            'correo' => $usuario->getCorreo(),
            'password' => bcrypt($data['password']),
            'rol' => $usuario->getRol(),
            'espacio_disponible' => 1,
            //'espacio_disponible' => $usuario->getEspacioDisponible(),
        ]);

        return $usuarioModel;
    }
    public function updateUser(int $id, array $data)
    {
        $usuarioModel = UsuarioModel::find($id);
        if (!$usuarioModel) {
            return false;
        }
        $usuarioModel->update($data);
        return new Usuario(
            '',
            $usuarioModel->nombres,
            $usuarioModel->apellidos,
            $usuarioModel->correo,
            '',
            $usuarioModel->rol,
            $usuarioModel->espacio_disponible
        );
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
