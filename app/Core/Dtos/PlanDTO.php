<?php
namespace App\Core\Dtos;

use App\Models\PlanModel;

class PlanDTO
{
    public function __construct(
        public string $id,
        public string $nombre,
        public float $precio = 0.0,
        public float $almacenamiento = 10.0,
        public int $periodo_meses = 1,
        public bool $esta_activo = true,
    ){ }

    public static function fromModel(PlanModel $model): self {
        return new self(
            id: (string) $model->id,
            nombre: $model->nombre,
            precio: $model->precio,
            almacenamiento: $model->almacenamiento,
            periodo_meses: $model->periodo_meses,
            esta_activo: $model->esta_activo,
        );
    }

    public function toArray(): array
    {
        return [
            "id"=> $this->id,
            "nombre"=> $this->nombre,
            "precio"=> $this->precio,
            "almacenamiento"=> $this->almacenamiento,
            "periodo_meses"=> $this->periodo_meses,
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
        $planModel->almacenamiento = $this->almacenamiento;
        $planModel->periodo_meses = $this->periodo_meses;
        $planModel->esta_activo = $this->esta_activo;

        return $planModel;
    }

}
