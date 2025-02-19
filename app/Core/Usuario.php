<?php
namespace App\Core;

class Usuario
{
    private $nombres = '';
    private $apellidos = '';
    private $correo = '';
    private $password = '';
    private $rol = '';
    private $espacio_disponible = '';
    public function __construct($nombres, $apellidos, $correo, $password, $rol, $espacio_disponible)
    {
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->correo = $correo;
        $this->password = $password;
        $this->rol = $rol;
        $this->espacio_disponible = $espacio_disponible;
    }

    public function Show()
    {
        return $this->nombres . ' ' . $this->apellidos . ' ' . $this->correo . ' ' . $this->password . ' ' . $this->rol . ' ' . $this->espacio_disponible;
    }
    public function toArray()
    {
        return [
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'correo' => $this->correo,
            'password' => $this->password,
            'rol' => $this->rol,
            'espacio_disponible' => $this->espacio_disponible,
        ];
    }
    public function getNombres()
    {
        return $this->nombres;
    }
    public function setNombres($nombre)
    {
        $this->nombres = $nombre;
    }
    public function getapellidos()
    {
        return $this->apellidos;
    }
    public function setapellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }
    public function getcorreo()
    {
        return $this->correo;
    }
    public function setcorreo($correo)
    {
        $this->correo = $correo;
    }
    public function getpassword()
    {
        return $this->password;
    }
    public function setpassword($password)
    {
        $this->password = $password;
    }
    public function getrol()
    {
        return $this->rol;
    }
    public function setrol($rol)
    {
        $this->rol = $rol;
    }
    public function getespacio_disponible()
    {
        return $this->espacio_disponible;
    }
    public function setespacio_disponible($espacio_disponible)
    {
        $this->espacio_disponible = $espacio_disponible;
    }

}
