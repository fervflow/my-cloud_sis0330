<?php
namespace App\Core\Services;
use App\Core\Archivo;
use App\Core\ListaArchivos;
use App\Models\ArchivoModel;
use GuzzleHttp\Psr7\Request;

class ArchivoService
{
    protected $listaArchivos;

    public function __construct(ListaArchivos $listaArchivos)
    {
        // $this->usuarioService = $usuarioService;
        $this->listaArchivos = $listaArchivos;
    }

    public function add(Archivo $archivo)
    {
        return ArchivoModel::create($archivo->toArray());
    }

    public function upload(Request $request)
    {
        return ArchivoModel::upload($request);
    }

    public function getArchivos()
    {
        return ArchivoModel::all();
    }

    public function createArchivo(array $data)
    {
        return ArchivoModel::create($data);
    }

    public function edit()
    {
    }

}
