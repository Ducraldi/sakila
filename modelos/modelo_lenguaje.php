<?php

require_once "config/conexion.php";

function obtenerLenguaje($conexion)
{
    $sql = "SELECT language_id, 
                   name, 
                   last_update, 
                DATE_FORMAT(last_update, '%d/%m/%Y %l:%i %p' ) AS fecha 
            FROM language";

    return $conexion->query($sql)->fetchAll();
}

function insertarLenguaje($conexion, $datos)
{

    $sql = "INSERT INTO language (name) VALUE (:nombreIdioma);";

    return $conexion->prepare($sql)->execute($datos);
}

function eliminarLenguaje($conexion, $datos)
{
    $sql = "DELETE FROM language WHERE language_id = :idIdioma;";

    return $conexion->prepare($sql)->execute($datos);
}