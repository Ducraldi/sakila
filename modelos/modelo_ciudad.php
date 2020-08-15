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
    $sql = "UPDATE address SET city_id = 1 WHERE city_id = :idCiudad;
            DELETE FROM city WHERE city_id = :idCiudad;";

    return $conexion->prepare($sql)->execute($datos);
}

function obtenerCiudadPorId($conexion, $datos)
{

    $sql = "SELECT * FROM city WHERE city_id = :idCiudad;";

    $query = $conexion->prepare($sql);

    $query->execute($datos);

    return $query->fetch();
}

function editarCiudades($conexion, $datos)
{
    $sql = "UPDATE city SET city = :ciudadPrincipal, country_id = :selecionPais 
            WHERE city_id = :idCiudad ;";

    return $conexion->prepare($sql)->execute($datos);
}
