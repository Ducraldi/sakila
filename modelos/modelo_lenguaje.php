<?php

require_once "config/conexion.php";

function obtenerLenguaje($conexion)
{
    $sql = "SELECT * FROM language";

    return $conexion->query($sql)->fetchAll();
}