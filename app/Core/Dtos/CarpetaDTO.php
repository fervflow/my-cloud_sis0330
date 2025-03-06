<?php

namespace App\DTO;

class CarpetaDTO
{
    private int $id;
    private string $nombre;

    // Constructor para inicializar las propiedades
    public function __construct(int $id, string $nombre)
    {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    // Método estático para crear el DTO desde un modelo
    public static function fromModel(\App\Models\CarpetaModel $carpeta): self
    {
        return new self(
            $carpeta->id_carpeta,
            $carpeta->nombre
        );
    }

    // Convertir el DTO a un array
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre
        ];
    }

    // Getter para id
    public function getId(): int
    {
        return $this->id;
    }

    // Setter para id
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    // Getter para nombre
    public function getNombre(): string
    {
        return $this->nombre;
    }

    // Setter para nombre
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    // Mostrar los valores del DTO en un formato legible
    public function show(): string
    {
        return "ID: {$this->id} - Nombre: {$this->nombre}";
    }
}
