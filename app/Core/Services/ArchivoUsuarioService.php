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

    public function obtenerArchivosRecienteUsuario($id_usuario)
    {
        return UsuarioArchivoModel::where('id_usuario', $id_usuario)
            ->with('archivo')
            ->orderBy('updated_at', 'desc')
            ->get();
    }

    public function obtenerArchivosTamanioUsuario($id_usuario)
    {
        return UsuarioArchivoModel::where('id_usuario', $id_usuario)
            ->with('archivo')
            ->join('archivos', 'usuarios_archivos.id_archivo', '=', 'archivos.id_archivo')
            ->orderBy('archivos.tamanio', 'desc')
            ->select('usuarios_archivos.*')
            ->get();
    }
    public function buscarArchivosPorNombre($id_usuario, $nombre)
    {
        return UsuarioArchivoModel::where('id_usuario', $id_usuario)
            ->whereHas('archivo', function ($query) use ($nombre) {
                $query->where('nombre', 'LIKE', "%{$nombre}%");
            })
            ->with('archivo')
            ->get();
    }

    public function eliminarArchivoUsuario($id_usuario, $id_archivo)
    {
        return UsuarioArchivoModel::where('id_archivo', $id_archivo)->delete();
    }

}
