<?php
namespace App\Core;

use App\Models\ArchivoModel;

class Archivo{
    private string $id;
    private $nombre = '';
    private $ruta = '';
    private $peso = '';
    private $tipo = '';
    private $fecha_expiracion = '';

    // public function __construct($nombre, $ruta, $peso, $tipo, $fecha_expiracion){
    //     $this->nombre = $nombre;
    //     $this->ruta = $ruta;
    //     $this->peso = $peso;
    //     $this->tipo = $tipo;
    //     $this->fecha_expiracion = $fecha_expiracion;
    // }

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '';
        $this->nombre = $data['nombre'] ?? '';
        $this->ruta = $data['ruta'] ?? '';
        $this->peso = $data['peso'] ??'';
        $this->tipo = $data['tipo'] ?? '';
        $this->fecha_expiracion = $data['fecha_expiracion'] ??'';
    }

    public function Show(){
        return $this->id.' '.$this->nombre.' '.$this->ruta.' '.$this->peso.' '.$this->tipo.' '.$this->fecha_expiracion;
    }

    public static function fromModel(ArchivoModel $archivo)
    {
        return new self([
            'nombre' => $archivo->nombre,
            'ruta' => $archivo->ruta,
            'peso' => $archivo->peso,
            'tipo' => $archivo->tipo,
            'fecha_expiracion' => $archivo->fecha_expiracion,
        ]);
    }
    public function toArray(){
        return [
            'nombre' => $this->nombre,
            'ruta' => $this->ruta,
            'peso' => $this->peso,
            'tipo' => $this->tipo,
            'fecha_expiracion' => $this->fecha_expiracion
        ];
    }
    public function getNombres(){
        return $this->nombre;
    }
    public function setNombres($nombre){
        $this->nombre = $nombre;
    }
    public function getRuta(){
        return $this->ruta;
    }
    public function setRuta($ruta){
        $this->ruta = $ruta;
    }
    public function getPeso(){
        return $this->peso;
    }
    public function setPeso($peso){
        $this->$peso = $peso;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function setTipo($tipo){
        $this->tipo = $tipo;
    }
    public function getFecha_expiracion(){
        return $this->fecha_expiracion;
    }
    public function setFecha_expiracion($fecha_expiracion){
        $this->fecha_expiracion = $fecha_expiracion;
    }
}
