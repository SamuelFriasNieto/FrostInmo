<?php

namespace App;

use mysqli;

class Propiedad extends ActiveRecord
{
    protected static $columnasDB = ['id','titulo','precio','descripcion','imagen',
    'wc','habitaciones','estacionamiento','creado','vendedor'];
    protected static $tabla = 'propiedades';

    public $id;
    public $titulo;
    public $precio;
    public $descripcion;
    public $imagen;
    public $wc;
    public $habitaciones;
    public $estacionamiento;
    public $creado;
    public $vendedor;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? "";
        $this->precio = $args['precio'] ?? "";
        $this->descripcion = $args['descripcion'] ?? "";
        $this->imagen = $args['imagen'] ?? "";
        $this->wc = $args['wc'] ?? "";
        $this->habitaciones = $args['habitaciones'] ?? "";
        $this->estacionamiento = $args['estacionamiento'] ?? "";
        $this->creado = date('Y-m-d');
        $this->vendedor = $args['vendedor'] ?? "";

    }
}
