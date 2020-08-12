<?php
// Incluid los modelos
require_once "funciones/ayudante.php";
require_once "modelos/modelo_lenguaje.php";
require_once "modelos/modelo_peliculas.php";
$nombrePagina = "Peliculas";



$tituloPelicula = $_POST['tituloPelicula'] ?? "";
$descripcionPelicula = $_POST['descripcionPelicula'] ?? "";
$lanzamientoPelicula = $_POST['lanzamientoPelicula'] ?? "";
$lenguajePelicula = $_POST['lenguajePelicula'] ?? "";
$precioPelicula = $_POST['precioPelicula'] ?? "";
$remplazoPelicula = $_POST['remplazoPelicula'] ?? "";
$longitudPelicula = $_POST['longitudPelicula'] ?? "";
$clasificacionlPelicula = $_POST['clasificacionlPelicula'] ?? "";
$especialPelicula = $_POST['especialPelicula'] ?? "";

imprimirArray($_POST);
// asegurarno del que usuario alga hecho click en el boton

try {
    if (isset($_POST['guardar_pelicula'])) {
        // codigo para guarda base de datos
        echo "se va a guardar los datos...";
        if (empty($tituloPelicula)) {
            throw new Exception("El titulo de la pelicula no puede estar vacio");
        }
        if (empty($descripcionPelicula)) {
            throw new Exception("La descripcion de la pelicula no puede estar vacio");
        }
        if (empty($lanzamientoPelicula)) {
            throw new Exception("Agrege el lanzamiento de la pelicula");
        }
        if (empty($precioPelicula)) {
            throw new Exception("Precio de la pelicula no puede estar vacio");
        }
        if (empty($remplazoPelicula)) {
            throw new Exception("El remplazo de la pelicula no puede estar vacio");
        }

        if (empty($longitudPelicula)) {
            throw new Exception("La longitud de la pelicula no puede estar vacia");
        }
        if (empty($clasificacionlPelicula)) {
            throw new Exception("Requiere de clasificacion de pelicula");
        }
        if (empty($especialPelicula)) {
            throw new Exception("Especifique la especialidades de la pelicula");
        }

        $especialPelicula = implode(",", $especialPelicula);

        $datos = compact('tituloPelicula', 'descripcionPelicula', 'lenguajePelicula', 'precioPelicula', 'lanzamientoPelicula', 'remplazoPelicula', 'longitudPelicula', 'clasificacionlPelicula', 'especialPelicula');

        imprimirArray($datos);

        $peliculaIncertado = insertarPelículas($conexion, $datos);
        $mensaje = "Los datos sean guardado correctamente";

        // lanzar un error si no se inserto correctamente
        if (!$peliculaIncertado) {
            throw new Exception("Ocurrio un error al insertar los datos del actor");
        }

        // Redicionar la pagina
        redireccionar("pelicula.php");
    }

    // Asegurarns que el usuario haya echo cick en el boton de eliminar
    if (isset($_POST['eliminarPelicula'])) {
        $idPelicula = $_POST['eliminarPelicula'] ?? "";

        // validar
        if (empty($idPelicula)) {
            throw new Exception("El id de Pelicula no puede estar vacio");
        }
        // preparar array
        $datos = compact('idPelicula');

        // eliminar
        $eliminado = eliminarPelicula($conexion, $datos);
        $mensaje = "los datos fueron eliminados correctamente";

        // lanzar error
        if (!$eliminado) {
            throw new Exception("los datos no se eliminaron correctamente");
        }
        // Re-direccionar
        redireccionar("pelicula.php");
    }


} catch (Exception $e) {
    $error = $e->getMessage();
}

$lenguajesPeliculas = obtenerLenguaje($conexion);
$peliculas = obtenerPelículas($conexion);

// incluir la vista
include_once "vistas/vista_pelicula.php";

