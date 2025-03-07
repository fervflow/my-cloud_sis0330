<?php

namespace App\Core\Services;

use App\Core\DTOs\UsuarioCarpetaDTO;
use App\Models\UsuarioCarpetaModel;

class UsuarioCarpetaService
{
    /**
     * Asocia un usuario a una carpeta.
     *
     * @param UsuarioCarpetaDTO $usuarioCarpetaDTO
     * @return UsuarioCarpetaModel
     */
    public function asociarUsuarioCarpeta(UsuarioCarpetaDTO $usuarioCarpetaDTO)
    {
        return UsuarioCarpetaModel::create($usuarioCarpetaDTO->toArray());
    }

    /**
     * Elimina la asociación de un usuario con una carpeta.
     *
     * @param int $id_usuario
     * @param int $id_carpeta
     * @return bool
     */
    public function desasociarUsuarioCarpeta($id_usuario, $id_carpeta)
    {
        return UsuarioCarpetaModel::where('id_usuario', $id_usuario)
            ->where('id_carpeta', $id_carpeta)
            ->delete();
    }

    /**
     * Obtiene todas las carpetas asociadas a un usuario.
     *
     * @param int $id_usuario
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function obtenerCarpetasPorUsuario($id_usuario)
    {
        return UsuarioCarpetaModel::where('id_usuario', $id_usuario)
            ->with('carpeta') // Carga la relación "carpeta"
            ->get();
    }
}
