<?php

require_once "config/conexion.php";

function obtenerTiendas($conexion)
{
    $sql = "SELECT sto.store_id, sto.manager_staff_id, sto.address_id, sta.first_name, adr.address
            FROM store as sto
            left JOIN staff as sta on sto.manager_staff_id = sta.staff_id
            left JOIN address as adr on sto.address_id = adr.address_id";

    return $conexion->query($sql)->fetchAll();
}

function obtenerTodasTiendas($conexion)
{
    $sql = "SELECT * FROM store";

    return $conexion->query($sql)->fetchAll();
}

function insertarTiendas($conexion, $datos)
{
    $sql = "INSERT INTO store (manager_staff_id, address_id) VALUE (:gerenteTienda, :direccionTienda);";
    return $conexion->prepare($sql)->execute($datos);
}