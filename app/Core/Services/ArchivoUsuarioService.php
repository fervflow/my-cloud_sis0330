<?php

namespace App\Core\Services;

use App\Core\Dtos\ArchivoUsuarioDTO;
use App\Models\UsuarioArchivoModel;

class ArchivoUsuarioService
{
    public function crearArchivoUsuario(ArchivoUsuarioDTO $archivoUsuarioDTO)
    {
        $usuarioArchivo = new UsuarioArchivoModel();
        $usuarioArchivo->id_usuario = $archivoUsuarioDTO->getIdUsuario();
        $usuarioArchivo->id_archivo = $archivoUsuarioDTO->getIdArchivo();
        $usuarioArchivo->id_carpeta = $archivoUsuarioDTO->getIdCarpeta();

        $usuarioArchivo->save();

        return $usuarioArchivo;
    }

    public function obtenerArchivosUsuario($id_usuario)
    {
        return UsuarioArchivoModel::where('id_usuario', $id_usuario)->get();
    }

    public function eliminarArchivoUsuario($id_usuario, $id_archivo)
    {
        return UsuarioArchivoModel::where('id_usuario', $id_usuario)
            ->where('id_archivo', $id_archivo)
            ->delete();
    }
}
