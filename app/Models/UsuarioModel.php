<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UsuarioModel extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombres',
        'apellidos',
        'correo',
        'password',
        'rol',
        'espacio_disponible',
        'espacio_total'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'correo_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function carpetas()
    {
        return $this->belongsToMany(CarpetaModel::class, 'usuarios_carpetas', 'id_usuario', 'id_carpeta');
    }
    protected static function booted()
    {
        static::created(function ($usuario) {
            // Crear una nueva carpeta o seleccionar una existente
            $carpeta = CarpetaModel::firstOrCreate([
                'nombre' => 'Carpeta Principal',
            ]);

            // Asociar la carpeta al usuario
            $usuario->carpetas()->attach($carpeta->id_carpeta);
        });
    }
}
