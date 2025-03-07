<?php

namespace App\Core\Services;

use App\Core\DTOs\CarpetaDTO;
use App\Models\CarpetaModel;
use App\Models\UsuarioCarpetaModel;
use App\Models\UsuarioModel;


class CarpetaService {

    /**
     * Crea una nueva carpeta.
     *
     * @param CarpetaDTO $carpeta
     * @return CarpetaModel
     */
    public function add(CarpetaDTO $carpeta) {
        return CarpetaModel::create($carpeta->toArray());
    }

    /**
     * Obtiene todas las carpetas.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCarpetas() {
        return CarpetaModel::all();
    }

    /**
     * Crea una carpeta a partir de un array de datos.
     *
     * @param array $data
     * @return CarpetaModel
     */
    public function createCarpeta(array $data) {
        return CarpetaModel::create($data);
    }

    /**
     * Edita una carpeta existente.
     *
     * @param int $id
     * @param array $data
     * @return CarpetaModel|null
     */
    public function edit(int $id, array $data) {
        $carpeta = CarpetaModel::find($id);
        if ($carpeta) {
            $carpeta->update($data);
            return $carpeta;
        }
        return null;
    }

    /**
     * Obtiene una carpeta por su ID.
     *
     * @param int $id
     * @return CarpetaModel|null
     */
    public function getCarpetaById(int $id) {
        return CarpetaModel::find($id);
    }

    /**
     * Elimina una carpeta por su ID.
     *
     * @param int $id
     * @return void
     */
    public function eliminarCarpeta(int $id
    ) {
        $carpeta = CarpetaModel::find($id);
        if ($carpeta) {
            $carpeta->delete();
        }
    }
    public function obtenerCarpetasPorUsuario($idUsuario)
    {
        $carpetas = UsuarioCarpetaModel::where('id_usuario', $idUsuario)
            ->with('carpeta')
            ->get()
            ->pluck('carpeta');
        return $carpetas;
    }
    public function asociarCarpetaAutomaticamente($idUsuario)
    {
        // Obtener el usuario
        $usuario = UsuarioModel::find($idUsuario);

        if (!$usuario) {
            throw new \Exception('El usuario no existe.');
        }

        // Crear una nueva carpeta o seleccionar una existente
        $carpeta = CarpetaModel::firstOrCreate([
            'nombre' => 'Carpeta Automática',
        ]);

        // Asociar la carpeta al usuario
        $usuario->carpetas()->attach($carpeta->id_carpeta);

        return true;
    }
}
