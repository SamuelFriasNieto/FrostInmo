<?php

function conectarDB() :mysqli {
    $db = mysqli_connect('localhost', 'root', 'root', 'frostinmo_crud');

    if(!$db) {
        echo 'No se pudo conectar';
        exit;
    } 

    return $db;
}