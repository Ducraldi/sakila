<?php

$nombrePagina = "Peliculas";


// Incluid los modelos
require_once "modelos/modelo_lenguaje.php";

$lenguajesPeliculas = obtenerLenguaje($conexion);


$tituloPelicula = $_POST['tituloPelicula'] ?? "";
$descripcionPelicula = $_POST['descripcionPelicula'] ?? "";
$lanzamientoPelicula = $_POST['lanzamientoPelicula'] ?? "";
$lenguajePelicula = $_POST['lenguajePelicula'] ?? "";
$precioPelicula = $_POST['precioPelicula'] ?? "";
$precioPelicula = $_POST['codigoPostal'] ?? "";
$specialPelicula = $_POST['specialPelicula'] ?? "";

// asegurarno del que usuario alga hecho click en el boton

if (isset($_POST['guardar_pelicula'])) {
    // codigo para guarda base de datos
    echo "se va a guardar los datos...";
}


// incluir la vista
include_once "vistas/vista_pelicula.php";

