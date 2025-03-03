<?php
namespace App\Core\Services;

use App\Core\Dtos\ArchivoDTO;
use App\Models\ArchivoModel;
use GuzzleHttp\Psr7\Request;

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
    public function getArchivoById($id)
    {
        return ArchivoModel::find($id);
    }

    public function eliminarArchivo($id)
    {
        $archivo = ArchivoModel::find($id);
        if ($archivo) {
            $archivo->delete();
        }
    }


}
