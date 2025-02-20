<?php
namespace App\Core;
use App\Core\Archivo;
use App\Core\Validar;
use App\Core\Services\ArchivoService;

class ListaArchivos
{
    private array $listaArchivo;
    private ArchivoService $archivoService;
    public function __construct()
    {
        $this->archivoService = new ArchivoService();
    }
    public function add(Archivo $arch)
    {
        if (!Validar::isnull($arch->getNombres()) && !Validar::isnull($arch->getfecha_expiracion()))
            return $this->archivoService->add($arch);
        return null;
    }
    public function list()
    {
        return $this->archivoService->getUsuarios();
    }
    public function edit()
    {
    }

}
