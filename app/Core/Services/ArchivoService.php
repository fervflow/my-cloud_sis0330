<?php
namespace App\Core\Services;
use App\Core\Archivos;
use App\Models\ArchivoModel;

class ArchivoService
{

    public function add(Archivos $archivo)
    {
        return ArchivoModel::create($archivo->toArray());
    }

    public function getArchivos()
    {
        return ArchivoModel::all();
    }
/*
    public function findUserByEmail(string $email)
    {
        return ArchivoModel::where('correo', $email)->first();
    }
*/
    public function createArchivo(array $data)
    {
        return ArchivoModel::create($data);
    }

    public function edit()
    {
    }

}
