<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UsuarioModel;
use Illuminate\Support\Facades\Auth;
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
    public function usuarios()
    {
        return $this->belongsToMany(UsuarioModel::class, 'usuarios_carpetas', 'id_carpeta', 'id_usuario');
    }
    protected static function booted()
    {
        static::created(function ($carpeta) {
            // Obtener el usuario autenticado o un usuario específico
            $usuario = Auth::user() ?? UsuarioModel::first();

            // Asociar la carpeta al usuario
            $usuario->carpetas()->attach($carpeta->id_carpeta);
        });
    }
}
