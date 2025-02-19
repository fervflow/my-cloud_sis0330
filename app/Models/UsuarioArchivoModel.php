<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class UsuarioArchivoModel extends Model
{
    //
    use HasFactory;

    protected $table = 'usuarios_archivos';
    public $timestamps = true;

    protected $fillable = [
        'id_usuario',
        'id_archivo',
        'id_carpeta',
    ];

    public function usuario()
    {
        return $this->belongsTo(UsuarioModel::class, 'id_usuario', 'id');
    }

    public function archivo()
    {
        return $this->belongsTo(ArchivoModel::class, 'id_archivo', 'id_archivo');
    }

    public function carpeta()
    {
        return $this->belongsTo(CarpetaModel::class, 'id_carpeta', 'id_carpeta');
    }
}
