<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class CompartirArchivoModel extends Model
{
    //
    use HasFactory;

    protected $table = 'compartir_archivos';
    protected $primaryKey = 'id_compartir_archivo';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_usuario',
        'id_archivo',
    ];

    public function usuario()
    {
        return $this->belongsTo(UsuarioModel::class, 'id_usuario', 'id');
    }

    public function archivo()
    {
        return $this->belongsTo(ArchivoModel::class, 'id_archivo', 'id_archivo');
    }
}
