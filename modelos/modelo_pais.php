<?php

require_once "config/conexion.php";

function obtenerPaises($conexion)
{
    $sql = "SELECT * FROM country";

    return $conexion->query($sql)->fetchAll();
}

function incertarPaises($conexion, $datos)
{
    $sql = "INSERT INTO country (country) VALUE (:pais);";
    return $conexion->prepare($sql)->execute($datos);
}

function eliminarPaises($conexion, $datos)
{
    $sql = "UPDATE city SET country_id = 1 WHERE country_id = :idPais;
            DELETE FROM country WHERE country_id = :idPais;";

    return $conexion->prepare($sql)->execute($datos);
}

function obtenerPaisPorId($conexion, $datos)
{
    $sql = "SELECT * FROM country WHERE country_id = :idPais;";

    $query = $conexion->prepare($sql);

    $query->execute($datos);

    return $query->fetch();
}

function editarPaises($conexion, $datos)
{
    $sql = "UPDATE country SET country = :pais WHERE country_id = :idPais ;";

    return $conexion->prepare($sql)->execute($datos);
}