<?php

require_once "config/conexion.php";

function obtenerPersonal($conexion)
{
    $sql = "SELECT * FROM staff";

    return $conexion->query($sql)->fetchAll();
}

function intesertarPersonal($conexion, $datos)
{
    $sql = "INSERT INTO staff (first_name, last_name, address_id, picture, email, store_id, username, password) 
                VALUE (:nombrePersonal, :apellidoPersonal, :direccionPersonal, :imagenPersonal, :emailPersonal, :tiendaPersonal, :usuarioPersonal, :contrasenaPersonal);";

    return ($conexion)->prepare($sql)->execute($datos);


}