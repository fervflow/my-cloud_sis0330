<?php
namespace App\Core\Services;

use App\Core\Dtos\PlanDTO;
use App\Models\PlanModel;

class PlanService
{
    public function getPlans()
    {
        $plans = PlanModel::all();

        return $plans->map(function ($plan) {
            return PlanDTO::fromModel($plan);
        });
    }

    public function createPlan(PlanDTO $planDTO): PlanDTO
    {
        $planModel = new PlanModel();
        $planModel->fill($planDTO->toArray());
        $planModel->save();

        return PlanDTO::fromModel($planModel);
    }

    public function findPlanById(string $id): ?PlanDTO
    {
        $plan = PlanModel::find($id);

        if ($plan) {
            return PlanDTO::fromModel($plan);
        }

        return null;
    }

    public function deletePlan(string $id): bool
    {
        $planModel = PlanModel::find($id);
        if (!$planModel) {
            return false;
        }
        return $planModel->delete();
    }
}
