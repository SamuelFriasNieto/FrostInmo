<?php

function conectarDB() :mysqli {
    $db = new mysqli('localhost', 'root', 'root', 'frostinmo_crud');

    if(!$db) {
        echo 'No se pudo conectar';
        exit;
    } 

    return $db;
}