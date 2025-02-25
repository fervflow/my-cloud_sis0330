<?php
namespace App\Core\Services;

use App\Core\Dtos\PlanUsuarioDTO;
use App\Models\PlanUsuarioModel;

class PlanUsuarioService
{
    public function asignarOActualizarPlan(PlanUsuarioDTO $planUsuarioDTO): PlanUsuarioDTO
    {
        $existingPlan = PlanUsuarioModel::where('id_usuario', $planUsuarioDTO->id_usuario)->first();

        if ($existingPlan) {
            $existingPlan->id_plan = $planUsuarioDTO->id_plan;
            $existingPlan->fecha_pago = $planUsuarioDTO->fecha_pago;
            $existingPlan->fecha_renovacion = $planUsuarioDTO->fecha_renovacion;
            $existingPlan->esta_pagado = $planUsuarioDTO->esta_pagado;
            $existingPlan->save();

            return PlanUsuarioDTO::fromModel($existingPlan);
        }

        $planUsuarioModel = new PlanUsuarioModel();
        $planUsuarioModel->fill($planUsuarioDTO->toArray());
        $planUsuarioModel->save();

        return PlanUsuarioDTO::fromModel($planUsuarioModel);
    }

    public function removerPlanDeUsuario(string $id_usuario): bool
    {
        $planUsuarioModel = PlanUsuarioModel::where('id_usuario', $id_usuario)->first();

        if (!$planUsuarioModel) {
            return false;
        }

        return $planUsuarioModel->delete();
    }

    public function obtenerPlanDeUsuario(string $id_usuario): ?PlanUsuarioDTO
    {
        $plan = PlanUsuarioModel::where('id_usuario', $id_usuario)->first();

        if ($plan) {
            return PlanUsuarioDTO::fromModel($plan);
        }

        return null;
    }

    public function marcarPlanComoPagado(string $id_usuario): ?PlanUsuarioDTO
    {
        // $planUsuarioModel = PlanUsuarioModel::where('id_usuario', $id_usuario)->first();
        $planUsuarioDto = $this->obtenerPlanDeUsuario($id_usuario);

        if (!$planUsuarioDto) {
            return null;
        }

        $planUsuarioDto->esta_pagado = true;
        $planUsuarioModel = $planUsuarioDto->toModel();
        $planUsuarioModel->save();

        return PlanUsuarioDTO::fromModel($planUsuarioModel);
    }
}
