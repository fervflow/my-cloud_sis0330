<?php

namespace App\Core\Services;

use App\Core\Dtos\CompartirArchivoDTO;
use App\Models\CompartirArchivoModel;

class CompartirArchivoService
{
    public function compartirArchivo(CompartirArchivoDTO $dto)
    {
        $compartirArchivo = new CompartirArchivoModel();
        $compartirArchivo->id_usuario = $dto->getIdUsuario();
        $compartirArchivo->id_usuario_destino = $dto->getIdUsuarioDestino();
        $compartirArchivo->id_archivo = $dto->getIdArchivo();
        $compartirArchivo->save();
    }
}

