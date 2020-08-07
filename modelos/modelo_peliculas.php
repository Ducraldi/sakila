<?php
require_once "config/conexion.php";

function obtenerPelículas($conexion){
    $sql = "SELECT f.film_id,
       f.title,
       f.description,
       f.release_year,
       f.rental_duration,
       f.rental_rate,
       f.length,
       f.replacement_cost,
       f.rating,
       f.special_features,
       f.last_update,
       DATE_FORMAT(f.last_update, '%d/%m/%Y %l:%i %p' ) AS fecha
       FROM film AS f
            LEFT JOIN language AS l on f.language_id = l.language_id;";

     return $conexion->query($sql)->fetchAll();

}
function insertarPelículas($conexion, $datos)
{
    $sql = "INSERT INTO film (title,
                  description,
                  release_year,
                  rental_duration,
                  rental_rate,
                  length,
                  replacement_cost,
                  rating,
                  special_features) VALUE (:tituloPelicula, :descripcionPelicula, :lanzamientoPelicula, :precioPelicula, :remplazoPelicula, :clasificacionlPelicula, :especialPelicula)";
    return $conexion->prepare($sql)->execute($datos);
}