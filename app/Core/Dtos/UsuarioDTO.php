<?php
namespace App\Core\Dtos;

use App\Models\UsuarioModel;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UsuarioDTO extends Authenticatable
{
    public function __construct(
        public string $nombres,
        public string $apellidos,
        public string $correo,
        public readonly string $id = '',
        public readonly string $password = '',
        public string $rol = 'usuario',
        public float $espacio_disponible = 10.00,
    ) {}

    public static function fromModel(UsuarioModel $model): self {
        return new self(
            id: (string) $model->id,
            nombres: $model->nombres,
            apellidos: $model->apellidos,
            correo: $model->correo,
            password: $model->password,
            rol: $model->rol,
            espacio_disponible: $model->espacio_disponible
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'correo' => $this->correo,
            'password' => $this->password,
            'rol' => $this->rol,
            'espacio_disponible' => $this->espacio_disponible,
        ];
    }

    public function toModel(): UsuarioModel
    {
        $usuarioModel = new UsuarioModel();

        if ($this->id) {
            $usuarioModel->id = $this->id;
        }

        $usuarioModel->nombres = $this->nombres;
        $usuarioModel->apellidos = $this->apellidos;
        $usuarioModel->correo = $this->correo;
        $usuarioModel->password = $this->password;
        $usuarioModel->rol = $this->rol;
        $usuarioModel->espacio_disponible = $this->espacio_disponible;

        return $usuarioModel;
    }
}

