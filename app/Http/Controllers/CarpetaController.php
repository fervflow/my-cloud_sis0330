<?php

namespace App\Http\Controllers;

use App\Models\CarpetaModel;

class CarpetaController extends Controller
{
    public function index() {
        dd("Llega aquí 1");
        $carpetas = CarpetaModel::all();
        dd("Llega aquí 2", $carpetas);
        return view('carpeta.index', compact('carpetas'));
    }

}
