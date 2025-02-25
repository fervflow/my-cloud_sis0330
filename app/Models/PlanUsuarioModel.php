<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanUsuarioModel extends Model
{
    use HasFactory;

    protected $table = 'plan_usuario';

    protected $fillable = [
        'id_usuario',
        'id_plan',
        'fecha_pago',
        'fecha_renovacion',
        'esta_pagado'
    ];

    protected $casts = [
        'esta_pagado' => 'boolean',
        'fecha_pago' => 'date',
        'fecha_renovacion' => 'date'
    ];

    public function usuario()
    {
        return $this->belongsTo(UsuarioModel::class, 'id_usuario');
    }

    public function plan()
    {
        return $this->belongsTo(PlanModel::class, 'id_plan');
    }
}
