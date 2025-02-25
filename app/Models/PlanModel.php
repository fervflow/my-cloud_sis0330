<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'plan';

    protected $fillable = [
        'nombre',
        'precio',
        'almacenamiento',
        'periodo_meses',
        'esta_activo'
    ];

    protected $casts = [
        'esta_activo' => 'boolean',
        'precio' => 'float',
        'almacenamiento' => 'float'
    ];

    public function usuarios()
    {
        return $this->hasMany(PlanUsuarioModel::class, 'id_plan');
    }
}
