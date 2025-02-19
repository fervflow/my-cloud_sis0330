<?php
namespace App\Core;
class Archivos{
    private $nombre = '';
    private $ruta = '';
    private $tamaño = '';
    private $tipo = '';
    private $fecha_expiracion = '';
    public function __construct($nombre, $ruta, $tamaño, $tipo, $fecha_expiracion){
        $this->nombre = $nombre;
        $this->ruta = $ruta;
        $this->tamaño = $tamaño;
        $this->tipo = $tipo;
        $this->fecha_expiracion = $fecha_expiracion;
    }

    public function Show(){
        return $this->nombre.' '.$this->ruta.' '.$this->tamaño.' '.$this->tipo.' '.$this->fecha_expiracion;
    }
    public function toArray(){
        return [
            'nombre' => $this->nombre,
            'ruta' => $this->ruta,
            'tamaño' => $this->tamaño,
            'tipo' => $this->tipo,
            'fecha_expiracion' => $this->fecha_expiracion
        ];
    }
    public function getNombres(){
        return $this->nombre;
    }
    public function setNombres($nombre){
        $this->nombre=$nombre;
    }
    public function getruta(){
        return $this->ruta;
    }
    public function setruta($ruta){
        $this->ruta=$ruta;
    }
    public function gettamaño(){
        return $this->tamaño;
    }
    public function settamaño($tamaño){
        $this->tamaño=$tamaño;
    }
    public function gettipo(){
        return $this->tipo;
    }
    public function settipo($tipo){
        $this->tipo=$tipo;
    }
    public function getfecha_expiracion(){
        return $this->fecha_expiracion;
    }
    public function setfecha_expiracion($fecha_expiracion){
        $this->fecha_expiracion=$fecha_expiracion;
    }
}