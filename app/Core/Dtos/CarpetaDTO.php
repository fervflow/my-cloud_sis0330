<?php

namespace App\Core\Dtos;

class CarpetaDTO
{
    public ?int $id_carpeta;
    public string $nombre;

    public function __construct(?int $id_carpeta, string $nombre)
    {
        $this->id_carpeta = $id_carpeta;
        $this->nombre = $nombre;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id_carpeta: $data['id_carpeta'] ?? null,
            nombre: $data['nombre']
        );
    }

    public function toArray(): array
    {
        return [
            'id_carpeta' => $this->id_carpeta,
            'nombre' => $this->nombre,
        ];
    }
}
