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
    $sql = "UPDATE film SET language_id = 1 WHERE language_id = :idIdioma;
            DELETE FROM language WHERE language_id = :idIdioma;";

    return $conexion->prepare($sql)->execute($datos);
}

function obtenerIdiomaPorId($conexion, $datos)
{

    $sql = "SELECT * FROM language WHERE language_id = :idIdioma;";

    $query = $conexion->prepare($sql);

    $query->execute($datos);

    return $query->fetch();
}

function editarIdiomas($conexion, $datos)
{
    $sql = "UPDATE language SET name = :nombreIdioma
            WHERE language_id = :idIdioma;";

    return $conexion->prepare($sql)->execute($datos);
}