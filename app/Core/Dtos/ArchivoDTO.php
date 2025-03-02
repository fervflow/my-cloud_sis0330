<?php
namespace App\Core\Dtos;

class ArchivoDTO {
    private $nombre = '';
    private $ruta = '';
    private $tamanio = '';
    private $tipo = '';
    private $fecha_expiracion = '';

    public function __construct($nombre, $ruta, $tamanio, $tipo, $fecha_expiracion) {
        $this->nombre = $nombre;
        $this->ruta = $ruta;
        $this->tamanio = $tamanio;
        $this->tipo = $tipo;
        $this->fecha_expiracion = $fecha_expiracion;
    }

    public function show() {
        return "{$this->nombre} {$this->ruta} {$this->tamanio} {$this->tipo} {$this->fecha_expiracion}";
    }

    public function toArray() {
        return [
            'nombre' => $this->nombre,
            'ruta' => $this->ruta,
            'tamanio' => $this->tamanio,
            'tipo' => $this->tipo,
            'fecha_expiracion' => $this->fecha_expiracion
        ];
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getRuta() {
        return $this->ruta;
    }

    public function setRuta($ruta) {
        $this->ruta = $ruta;
    }

    public function getTamanio() {
        return $this->tamanio;
    }

    public function setTamanio($tamanio) {
        $this->tamanio = $tamanio;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getFechaExpiracion() {
        return $this->fecha_expiracion;
    }

    public function setFechaExpiracion($fecha_expiracion) {
        $this->fecha_expiracion = $fecha_expiracion;
    }
}
