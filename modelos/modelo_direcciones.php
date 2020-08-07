<?php
require_once "config/conexion.php";

function obtenerDirecciones($conexion)
{
    $sql = "SELECT * FROM address";

    // $sql = "SELECT  ad.address_id, ad.address, address2, district, ci.city_id, postal_code, phone
    //            FROM address AS ad
    //            INNER JOIN city AS ci ON ad.city_id = ci.city_id;";

    return $conexion->query($sql)->fetchAll();
}

function insertarDirecciones($conexion, $datos)
{
    $sql = "INSERT INTO address (address, address2, district, city_id, postal_code, phone)
            VALUE (:direccionPrincipal, :direccionSecundaria, :distrito, :ciudad, :codigoPostal, :telefono);";

    return $conexion->prepare($sql)->execute($datos);
}
