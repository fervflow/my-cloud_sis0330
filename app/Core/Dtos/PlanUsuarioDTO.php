<?php
namespace App\Core\Dtos;

use App\Models\PlanUsuarioModel;

class PlanUsuarioDTO
{
    public function __construct(
        public string $id,
        public string $id_usuario,
        public string $id_plan,
        public string $fecha_pago,
        public string $fecha_renovacion,
        public bool $esta_pagado = false,
    ){ }

    public static function fromModel(PlanUsuarioModel $model): self {
        return new self(
            id: (string) $model->id,
            id_usuario: (string) $model->id_usuario,
            id_plan: (string) $model->id_plan,
            fecha_pago: $model->fecha_pago->format('Y-m-d'),
            fecha_renovacion: $model->fecha_renovacion->format('Y-m-d'),
            esta_pagado: $model->esta_pagado,
        );
    }

    public function toArray(): array
    {
        return [
            "id" => $this->id,
            "id_usuario" => $this->id_usuario,
            "id_plan" => $this->id_plan,
            "fecha_pago" => $this->fecha_pago,
            "fecha_renovacion" => $this->fecha_renovacion,
            "esta_pagado" => $this->esta_pagado,
        ];
    }

    public function toModel(): PlanUsuarioModel
    {
        $planUsuarioModel = new PlanUsuarioModel();

        if($this->id) {
            $planUsuarioModel->id = $this->id;
        }

        $planUsuarioModel->id_usuario = $this->id_usuario;
        $planUsuarioModel->id_plan = $this->id_plan;
        $planUsuarioModel->fecha_pago = $this->fecha_pago;
        $planUsuarioModel->fecha_renovacion = $this->fecha_renovacion;
        $planUsuarioModel->esta_pagado = $this->esta_pagado;

        return $planUsuarioModel;
    }
}
