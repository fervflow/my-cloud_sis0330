<?php

namespace App\Core\Dtos;
use App\Models\CompartirArchivoModel;
class ArchivoUsuarioDTO
{
    public $id_usuario;
    public $id_archivo;
    public $id_carpeta;

    public function __construct($id_usuario, $id_archivo, $id_carpeta)
    {
        $this->id_usuario = $id_usuario;
        $this->id_archivo = $id_archivo;
        $this->id_carpeta = $id_carpeta;
    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getIdArchivo()
    {
        return $this->id_archivo;
    }

    public function setIdArchivo($id_archivo)
    {
        $this->id_archivo = $id_archivo;
    }

    public function getIdCarpeta()
    {
        return $this->id_carpeta;
    }

    public function setIdCarpeta($id_carpeta)
    {
        $this->id_carpeta = $id_carpeta;
    }

    public function obtenerArchivosCompartidos($usuarioId)
    {
        return CompartirArchivoModel::where('id_usuario_destino', $usuarioId)
            ->join('archivos', 'archivos.id_archivo', '=', 'compartir_archivos.id_archivo')
            ->get(['archivos.*']);
    }

}
