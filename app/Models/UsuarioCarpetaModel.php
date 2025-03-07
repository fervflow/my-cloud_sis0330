<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class UsuarioCarpetaModel extends Model
{
    //
    use HasFactory;

    protected $table = 'usuarios_carpetas';
    public $timestamps = true;

    protected $fillable = [
        'id_usuario',
        'id_carpeta',
    ];

    public function usuario()
    {
        return $this->belongsTo(UsuarioModel::class, 'id_usuario', 'id');
    }

    public function carpeta()
    {
        return $this->belongsTo(CarpetaModel::class, 'id_carpeta', 'id_carpeta');
    }
    
}
