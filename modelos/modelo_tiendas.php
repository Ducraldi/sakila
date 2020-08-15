<?php

require_once "config/conexion.php";

function obtenerTiendas($conexion)
{
    $sql = "SELECT sto.store_id, 
       sto.manager_staff_id, 
       sto.address_id,
       sta.first_name, 
       adr.address,
       sto.last_update,
       DATE_FORMAT(sto.last_update, '%d/%m/%Y %l:%i %p' ) AS fecha
    FROM store as sto
    left JOIN staff as sta on sto.manager_staff_id = sta.staff_id
    left JOIN address as adr on sto.manager_staff_id = adr.address_id";

    return $conexion->query($sql)->fetchAll();
}

function obtenerTodasTiendas($conexion)
{
    $sql = "SELECT * FROM store";

    return $conexion->query($sql)->fetchAll();
}

function insertarTiendas($conexion, $datos)
{
    $sql = "INSERT INTO store (manager_staff_id, address_id) VALUES (:gerenteTienda, :direccionTienda);";
    return $conexion->prepare($sql)->execute($datos);
}

function verificarGerenteTienda($conexion, $datos)
{
    $sql = "SELECT * FROM store WHERE manager_staff_id = :gerenteTienda;";

    $query = $conexion->prepare($sql);
    $query->execute($datos);

    return $query->fetch();
}

function eliminarTiendas($conexion, $datos)
{
    $sql = "UPDATE staff SET store_id = 1 WHERE store_id = :idTienda;
            UPDATE inventory SET store_id = 1 WHERE store_id = :idTienda;
            UPDATE customer SET store_id = 1 WHERE store_id = :idTienda;
            DELETE FROM store WHERE store_id = :idTienda;";

    return $conexion->prepare($sql)->execute($datos);
}