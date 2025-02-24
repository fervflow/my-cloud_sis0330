<?php
namespace App\Core\Services;
use App\Core\Archivo;
use App\Models\ArchivoModel;
use GuzzleHttp\Psr7\Request;

class ArchivoService
{
    // protected $listaArchivos;

    // public function __construct(ListaArchivos $listaArchivos)
    // {
    //     // $this->usuarioService = $usuarioService;
    //     $this->listaArchivos = $listaArchivos;
    // }

    public function add(Archivo $archivo)
    {
        $newArchivo = ArchivoModel::create($archivo->toArray());
        return Archivo::fromModel($newArchivo);
    }

    public function upload(Request $request)
    {
        return ArchivoModel::upload($request);
    }

    public function getArchivos()
    {
        // $archivos = ArchivoModel::all();
        return ArchivoModel::all();
    }

    public function createArchivo(array $data)
    {
        $archivo = new Archivo($data);
        $archivoModel = ArchivoModel::create($archivo->toArray());
        return Archivo::fromModel($archivoModel);
    }

    public function edit()
    {
    }

}
