<?php
namespace App\Core\Services;

use App\Core\Dtos\ArchivoDTO;
use App\Models\ArchivoModel;

class ArchivoService {

    public function add(ArchivoDTO $archivo) {
        return ArchivoModel::create($archivo->toArray());
    }

    public function getArchivos() {
        return ArchivoModel::all();
    }

    public function createArchivo(array $data) {
        return ArchivoModel::create($data);
    }

    public function edit(int $id, array $data) {
        $archivo = ArchivoModel::find($id);
        if ($archivo) {
            $archivo->update($data);
            return $archivo;
        }
        return null;
    }
}
