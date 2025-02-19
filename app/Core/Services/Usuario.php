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
        return $this->nombre.' '.$this->apellidos.' '.$this->correo;
    }
    
}