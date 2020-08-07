<?php

require_once "config/conexion.php";

function obtenerActores($conexion)
{
    $sql = "SELECT * FROM actor;";

    return $conexion->query($sql)->fetchAll();
}

function insertarActores($conexion, $datos)
{
    $sql = "INSERT INTO actor (first_name, last_name) VALUE (:nombreActor, :apellidoActor);";

    return $conexion->prepare($sql)->execute($datos);
}

function eliminarActores($conexion, $datos)
 {
    $sql = "DELETE FROM film_actor WHERE actor_id = :idActor;
            DELETE FROM actor WHERE actor_id = :idActor;";

     return $conexion->prepare($sql)->execute($datos);
 }
