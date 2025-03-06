<?php

namespace App\Core\Services;

use App\Core\Dtos\CarpetaDTO;
use App\Models\CarpetaModel;

class CarpetaService
{

    public function add(CarpetaDTO $carpeta) {
        return CarpetaModel::create($carpeta->toArray());
    }
    // Obtener todas las carpetas
    public function obtenerCarpetas()
    {
        return CarpetaModel::all();
    }

    // Obtener carpeta por ID
    public function obtenerCarpetaPorId(int $id)
    {
        return CarpetaModel::find($id);
    }

    // Actualizar carpeta
    public function actualizarCarpeta(int $id, CarpetaDTO $carpetaDTO)
    {
        $carpeta = CarpetaModel::find($id);
        if ($carpeta) {
            $carpeta->update($carpetaDTO->toArray());
            return $carpeta;
        }
        return null;
    }

    // Eliminar carpeta
    public function eliminarCarpeta(int $id)
    {
        $carpeta = CarpetaModel::find($id);
        if ($carpeta) {
            $carpeta->delete();
        }
    }
}
