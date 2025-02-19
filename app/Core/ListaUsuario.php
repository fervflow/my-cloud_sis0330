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
    public function add(Usuario $usu)
    {
        if (!Validar::isnull($usu->getNombres()) && !Validar::isnull($usu->getcorreo()))
            return $this->usuarioService->add($usu);
        return null;
    }
    public function list()
    {
        return $this->usuarioService->getUsuarios();
    }
    public function edit()
    {
    }

}
