<?php
namespace App\Core;

class Usuario{
    private $nombre = '';
    private $apellidos = '';
    private $correo = '';
    private $password = '';
    private $rol = '';
    private $espacio_disponible = '';
    public function __construct($nombre, $apellidos, $correo, $password, $rol, $espacio_disponible){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->correo = $correo;
        $this->password = $password;
        $this->rol = $rol;
        $this->espacio_disponible = $espacio_disponible;
    }

    public function Show(){
        return $this->nombre.' '.$this->apellidos.' '.$this->correo.' '.$this->password.' '.$this->rol.' '.$this->espacio_disponible;
    }
    public function toArray(){
        return [
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos,
            'correo' => $this->correo
        ];
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function getapellidos(){
        return $this->apellidos;
    }
    public function setapellidos($apellidos){
        $this->apellidos=$apellidos;
    }
    public function getcorreo(){
        return $this->correo;
    }
    public function setcorreo($correo){
        $this->correo=$correo;
    }
    public function getpassword(){
        return $this->password;
    }
    public function setpassword($password){
        $this->password=$password;
    }
    public function getrol(){
        return $this->rol;
    }
    public function setrol($rol){
        $this->rol=$rol;
    }
    public function getespacio_disponible(){
        return $this->espacio_disponible;
    }
    public function setespacio_disponible($espacio_disponible){
        $this->espacio_disponible=$espacio_disponible;
    }

}
