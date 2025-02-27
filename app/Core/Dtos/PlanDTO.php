<?php
namespace App\Core\Dtos;

use App\Models\PlanModel;

class PlanDTO
{
    public function __construct(
        public string $id,
        public string $nombre,
        public float $precio = 0.0,
        public float $alamacenamiento = 10.0,
        public bool $esta_activo = true,
    ){ }

    public static function fromModel(PlanModel $model): self {
        return new self(
            id: (string) $model->id,
            nombre: $model->nombre,
            precio: $model->precio,
            alamacenamiento: $model->alamacenamiento,
            esta_activo: $model->esta_activo,
        );
    }

    public function toArray(): array
    {
        return [
            "id"=> $this->id,
            "nombre"=> $this->nombre,
            "precio"=> $this->precio,
            "almacenamiento"=> $this->alamacenamiento,
            "esta_activo"=> $this->esta_activo,
        ];
    }

    public function toModel(): PlanModel
    {
        $planModel = new PlanModel();

        if($this->id) {
            $planModel->id = $this->id;
        }

        $planModel->nombre = $this->nombre;
        $planModel->precio = $this->precio;
        $planModel->alamacenamiento = $this->alamacenamiento;
        $planModel->esta_activo = $this->esta_activo;

        return $planModel;
    }

}
