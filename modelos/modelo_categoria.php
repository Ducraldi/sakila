<?php
require_once "config/conexion.php";

function obtenerCategoria($conexion)
{
    $sql = "SELECT category_id,
                    name,
                    last_update,
                    DATE_FORMAT(last_update, '%d/%m/%Y %l:%i %p' ) AS fecha
            FROM category;";

    return $conexion->query($sql)->fetchAll();
}

function insertarCategoria($conexion, $datos)
{

    $sql = "INSERT INTO category (name)
            VALUE (:nombreCategoria);";

    return $conexion->prepare($sql)->execute($datos);
}

function eliminarCategoria($conexion, $datos)
{
    $sql = "UPDATE film_category SET category_id = 1 WHERE category_id = :idCategoria;
            DELETE FROM category WHERE category_id = :idCategoria;";

    return $conexion->prepare($sql)->execute($datos);
}

function obtenerCategoriaPorId($conexion, $datos)
{

    $sql = "SELECT * FROM category WHERE category_id = :idCategoria;";

    $query = $conexion->prepare($sql);

    $query->execute($datos);

    return $query->fetch();
}

function editarCategorias($conexion, $datos)
{
    $sql = "UPDATE category SET name = :nombreCategoria 
            WHERE category_id = :idActor ;";

    return $conexion->prepare($sql)->execute($datos);
}