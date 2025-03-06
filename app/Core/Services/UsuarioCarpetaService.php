<?php

namespace App\Core\Services;

use App\DTO\UsuarioCarpetaDTO;
use App\Models\UsuarioCarpetaModel;
use Illuminate\Support\Facades\DB;
class UsuarioCarpetaService
{
    public function asignarCarpetaAUsuario(UsuarioCarpetaDTO $usuarioCarpetaDTO)
    {
        // Validaciones de los datos
        if (empty($usuarioCarpetaDTO->id_usuario) || empty($usuarioCarpetaDTO->id_carpeta)) {
            throw new \InvalidArgumentException("El ID de usuario y el ID de carpeta son requeridos.");
        }

        DB::beginTransaction();
        try {
            $usuarioCarpeta = new UsuarioCarpetaModel();
            $usuarioCarpeta->id_usuario = $usuarioCarpetaDTO->id_usuario;
            $usuarioCarpeta->id_carpeta = $usuarioCarpetaDTO->id_carpeta;
            $usuarioCarpeta->save();

            DB::commit();
            return $usuarioCarpeta;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception("Error al asignar carpeta a usuario: " . $e->getMessage());
        }
    }

    public function obtenerCarpetasPorUsuario(int $id_usuario)
    {
        return UsuarioCarpetaModel::where('id_usuario', $id_usuario)->get();
    }

    public function obtenerUsuariosPorCarpeta(int $id_carpeta)
    {
        return UsuarioCarpetaModel::where('id_carpeta', $id_carpeta)->get();
    }

    public function eliminarAsignacion(int $id_usuario, int $id_carpeta)
    {
        return UsuarioCarpetaModel::where('id_usuario', $id_usuario)
            ->where('id_carpeta', $id_carpeta)
            ->delete();
    }
}
