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