<?php
require_once "config/conexion.php";

function obtenerPelículas($conexion){
    $sql = "SELECT f.film_id,
       f.title,
       f.description,
       f.release_year,
       CONCAT(f.release_year,'Años' ' ') AS release_year,
       f.rental_duration,
       f.rental_rate,
       CONCAT(f.rental_rate, ' ' 'Dinero') AS rental_rate,
       f.length, 
       CONCAT(f.length, ' ' 'Minutos') AS length,
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
                  language_id,
                  rental_rate,
                  length,
                  replacement_cost,
                  rating,
                  special_features) VALUES (
                                           :tituloPelicula, 
                                           :descripcionPelicula, 
                                           :lanzamientoPelicula, 
                                            :lenguajePelicula,
                                           :precioPelicula,
                                            :longitudPelicula, 
                                           :remplazoPelicula,
                                           :clasificacionlPelicula, 
                                           :especialPelicula)";
    return $conexion->prepare($sql)->execute($datos);
}

function eliminarPelicula($conexion, $datos)
{
    $sql = "UPDATE inventory SET film_id = 1 WHERE film_id = :idPelicula;
            UPDATE film_actor SET film_id = 1 WHERE film_id = :idPelicula;
            DELETE FROM film WHERE film_id = :idPelicula;";

    return $conexion->prepare($sql)->execute($datos);
}

