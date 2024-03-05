<?php

namespace App;

use mysqli;

class Propiedad
{
    protected static $db;
    protected static $columnasDB = ['id','titulo','precio','descripcion','imagen',
    'wc','habitaciones','estacionamiento','creado','vendedor'];

    protected static $errores = [];

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
        $this->imagen = $args['imagen'] ?? "";
        $this->wc = $args['wc'] ?? "";
        $this->habitaciones = $args['habitaciones'] ?? "";
        $this->estacionamiento = $args['estacionamiento'] ?? "";
        $this->creado = date('Y-m-d');
        $this->vendedor = $args['vendedor'] ?? "";

    }

    public function guardar() {
        if(isset($this->id)) {
            return $this->actualizar();
        } else {
            return $this->crear();
        }
    }

    public function crear()
    {
        $atributos = $this->sanitizarDatos();

        $string = join("', '",array_values($atributos));

        $query = " INSERT INTO propiedades (titulo, precio, descripcion, imagen, wc, habitaciones, estacionamiento, creado, vendedores_id ) 
        VALUES ( '". $string ."' ) ";

        $resultado = self::$db->query($query);

        return $resultado;
    }

    public function actualizar() {

        $atributos = $this->sanitizarDatos();

        $valores = [];
        foreach($atributos as $key => $value) {
            if($key === 'vendedor') {
                $valores[] = "vendedores_id = '$value'";
            } else {
                $valores[] = "$key = '$value'";
            }
        }

        $string = join(', ',$valores);

        $query = "UPDATE propiedades SET ";
        $query .= $string;
        $query .= " WHERE id = " . self::$db->escape_string($this->id);

        $resultado = self::$db->query($query);

        return $resultado;

    }

    public function eliminar() {
        $query = "DELETE FROM propiedades WHERE id = " . self::$db->escape_string($this->id);

        $resultado = self::$db->query($query);
        $this->borrarImagen();

        return $resultado;
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

    public function validarDatos() {
        cTexto($this->titulo,'titulo',self::$errores);
        cNum($this->precio,'precio',self::$errores,TRUE,10000000000);
        cImagen($this->imagen,'imagen',self::$errores);
        cTexto($this->descripcion,'descripcion',self::$errores);
        cNum($this->habitaciones,'habitaciones',self::$errores,TRUE,20);
        cNum($this->wc,'wc',self::$errores,TRUE,20);
        cNum($this->estacionamiento,'estacionamiento',self::$errores,TRUE,20);
        cNum($this->vendedor,'vendedor',self::$errores,TRUE,20);

        return self::$errores;
    }

    public function setImagen($imagen) {
        if(isset($this->id)) {
            $this->borrarImagen();
        }

        if($imagen) {
            $this->imagen = $imagen;
        }
    }

    public function borrarImagen() {
        $existeArchivo = file_exists(CARPETAS_IMAGENES . $this->imagen);
        if($existeArchivo) {
            unlink(CARPETAS_IMAGENES . $this->imagen);
        }
    }

    public static function getErrores() {
        return self::$errores;
    }

    public static function setDB($database) {
        self::$db = $database;
    }

    public static function all() {
        $query = "SELECT * FROM propiedades ORDER BY creado DESC";

        return self::consultarSQL($query);
    }

    public static function find($id) {
        $query = "SELECT * FROM propiedades WHERE id = '$id'";

        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }

    public static function consultarSQL($query) {
        $resultado = self::$db->query($query);

        $array = [];
        while($registro = $resultado->fetch_assoc()) {
            $array[] = self::crearObjeto($registro);
        }

        $resultado->free();

        return $array;

    }

    protected static function crearObjeto($registro) {
        $objeto = new self;

        foreach($registro as $key => $value) {
            if($key == 'vendedores_id'){
                $objeto->vendedor = $value;
            } elseif(property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    public function sincronizar($array = []) {
        foreach($array as $key => $value) {
            if(property_exists($this,$key) || is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
