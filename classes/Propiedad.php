<?php

namespace App;

use mysqli;

class Propiedad
{
    protected static $db;
    protected static $columnasDB = ['id','titulo','precio','descripcion','imagen',
    'wc','habitaciones','estacionamiento','creado','vendedor'];

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
        $this->id = $args['id'] ?? "";
        $this->titulo = $args['titulo'] ?? "";
        $this->precio = $args['precio'] ?? "";
        $this->descripcion = $args['descripcion'] ?? "";
        $this->imagen = $args['imagen'] ?? "imagen.jpg";
        $this->wc = $args['wc'] ?? "";
        $this->habitaciones = $args['habitaciones'] ?? "";
        $this->estacionamiento = $args['estacionamiento'] ?? "";
        $this->creado = date('Y-m-d');
        $this->vendedor = $args['vendedor'] ?? "";

    }

    public function guardar()
    {
        $atributos = $this->sanitizarDatos();

        $string = join("', '",array_values($atributos));

        $query = " INSERT INTO propiedades (titulo, precio, descripcion, imagen, wc, habitaciones, estacionamiento, creado, vendedores_id ) 
        VALUES ( '". $string ."' ) ";

        $resultado = self::$db->query($query);

        var_dump($resultado);
    }

    public function atributos() {
        $atributos = [];
        foreach(self::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }

        return $atributos;
    }

    public function sanitizarDatos() {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    public static function setDB($database) {
        self::$db = $database;
    }
}
