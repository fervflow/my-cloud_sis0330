<?php

namespace App\DTO;

class UsuarioCarpetaDTO
{
    public int $id_usuario;
    public int $id_carpeta;

    public function __construct(int $id_usuario, int $id_carpeta)
    {
        $this->id_usuario = $id_usuario;
        $this->id_carpeta = $id_carpeta;
    }

    public static function fromModel(\App\Models\UsuarioCarpetaModel $usuarioCarpeta): self
    {
        return new self(
            $usuarioCarpeta->id_usuario,
            $usuarioCarpeta->id_carpeta
        );
    }

    public function toArray(): array
    {
        return [
            'id_usuario' => $this->id_usuario,
            'id_carpeta' => $this->id_carpeta,
        ];
    }
}
