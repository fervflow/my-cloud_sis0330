<?php
namespace App\Core;
use App\Core\Usuario;
use App\Core\Validar;
use App\Core\Services\UsuarioService;

class ListaUsuario
{
    private array $listaUsuario;
    private UsuarioService $usuarioService;
    public function __construct()
    {
        $this->usuarioService = new UsuarioService();
    }
    public function add(Usuario $usuario, string $password)
    {
        /*if (!Validar::isnull($usu->getNombres()) && !Validar::isnull($usu->getcorreo()))
            return $this->usuarioService->add($usu);
        return null;*/
        if (!empty($usuario->getNombres()) && !empty($usuario->getApellidos()) && !empty($usuario->getCorreo()) && !empty($password)) {
            return $this->usuarioService->createUser([
                'nombres' => $usuario->getNombres(),
                'apellidos' => $usuario->getApellidos(),
                'correo' => $usuario->getCorreo(),
                'password' => $password,
                'rol' => 'usuario',
                'espacio_disponible' => $usuario->getEspacioDisponible(),
            ]);
        }
        return null;
    }
    public function list()
    {
        return $this->usuarioService->getUsuarios();
    }
    public function edit()
    {
    }

    public function encontrarPorEmail(string $email)
    {
        return $this->usuarioService->findUserByEmail($email);
    }

    public function changeRole(string $id, string $rol)
    {
        return $this->usuarioService->changeRole($id, $rol);
    }

}
