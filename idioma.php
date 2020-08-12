<?php
require_once "modelos/modelo_lenguaje.php";
require_once "funciones/ayudante.php";
$nombrePagina = "Idioma";


// Desclar Variables
$nombreIdioma = $_POST['nombreIdioma'] ?? "";

// asegurarno del que usuario alga hecho click en el boton

try {
    if (isset($_POST['guardar_idioma'])) {
        // codigo para guarda base de datos
        echo "se va a guardar los datos...";

        if (empty($nombreIdioma)) {
            throw new Exception("El idioma no puede estar vacio");
        }
        // para el array con lo datos
        $datos = compact('nombreIdioma');

        $idiomaIncertado = insertarLenguaje($conexion, $datos);
        $mensaje = "Los datos sean guardado correctamente";

        // lanzar un error si no se inserto correctamente
        if (!$idiomaIncertado) {
            throw new Exception("Ocurrio un error al insertar los datos de Lenguaje");
        }

        // Redicionar la pagina
        redireccionar("idioma.php");
    }

    // Asegurarns que el usuario haya echo cick en el boton de eliminar
    if (isset($_POST['eliminarIdioma'])) {
        $idIdioma = $_POST['eliminarIdioma'] ?? "";

        // validar
        if (empty($idIdioma)) {
            throw new Exception("El id de idioma no puede estar vacio");
        }
        // preparar array
        $datos = compact('idIdioma');

        // eliminar
        $eliminado = eliminarLenguaje($conexion, $datos);
        $mensaje = "los datos fueron eliminados correctamente";

        // lanzar error
        if (!$eliminado) {
            throw new Exception("los datos no se eliminaron correctamente");
        }
        // Re-direccionar
        redireccionar("idioma.php");
    }


} catch (Exception $e) {
    $error = $e->getMessage();
}


$lenguajes = obtenerLenguaje($conexion);

// incluir  vista
include_once "vistas/vista_idioma.php";