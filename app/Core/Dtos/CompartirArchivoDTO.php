<?php

namespace App\Core\Dtos;
class CompartirArchivoDTO
{
    private $id_usuario;
    private $id_usuario_destino;
    private $id_archivo;

    public function __construct($id_usuario, $id_usuario_destino, $id_archivo)
    {
        $this->id_usuario = $id_usuario;
        $this->id_usuario_destino = $id_usuario_destino;
        $this->id_archivo = $id_archivo;
    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function getIdUsuarioDestino()
    {
        return $this->id_usuario_destino;
    }

    public function getIdArchivo()
    {
        return $this->id_archivo;
    }
}

