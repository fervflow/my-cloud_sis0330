<?php

namespace App\Core\DTOs;

class UsuarioCarpetaDTO
{
    public $id_usuario;
    public $id_carpeta;

    public function __construct($id_usuario, $id_carpeta)
    {
        $this->id_usuario = $id_usuario;
        $this->id_carpeta = $id_carpeta;
    }

    /**
     * Obtiene el ID del usuario.
     *
     * @return int
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * Establece el ID del usuario.
     *
     * @param int $id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    /**
     * Obtiene el ID de la carpeta.
     *
     * @return int
     */
    public function getIdCarpeta()
    {
        return $this->id_carpeta;
    }

    /**
     * Establece el ID de la carpeta.
     *
     * @param int $id_carpeta
     */
    public function setIdCarpeta($id_carpeta)
    {
        $this->id_carpeta = $id_carpeta;
    }

    /**
     * Convierte el DTO a un array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'id_usuario' => $this->id_usuario,
            'id_carpeta' => $this->id_carpeta,
        ];
    }
}
