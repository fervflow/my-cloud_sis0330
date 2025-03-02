<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class ArchivoModel extends Model
{
    //
    use HasFactory;

    protected $table = 'archivos';
    protected $primaryKey = 'id_archivo';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nombre',
        'ruta',
        'tamanio',
        'tipo',
        'fecha_expiracion',
    ];

    protected function casts(): array
    {
        return [
            'fecha_expiracion' => 'date',
        ];
    }
}
