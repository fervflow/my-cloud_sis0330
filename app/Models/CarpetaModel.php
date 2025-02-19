<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarpetaModel extends Model
{
    //
    use HasFactory;

    protected $table = 'carpetas';
    protected $primaryKey = 'id_carpeta';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nombre',
    ];
}
