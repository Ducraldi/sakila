<?php

require_once "config/conexion.php";

function obtenerCiudades($conexion)
{

    $sql = "SELECT ci.city_id, ci.city, co.country
                FROM city AS ci
                LEFT JOIN country AS co ON co.country_id = ci.country_id";

    return $conexion->query($sql)->fetchAll();
}

function insertarCiudades($conexion, $datos)
{
    $sql = "INSERT INTO city (city, country_id)
            values (:ciudadPrincipal, :selecionPais);";
    return $conexion->prepare($sql)->execute($datos);
}

function eliminarCiudades($conexion, $datos)
{
    $sql = "DELETE FROM city WHERE city_id = :idCiudad;";

    return $conexion->prepare($sql)->execute($datos);
}


