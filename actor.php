<?php
require_once "modelos/modelo_actor.php";
require_once "funciones/ayudante.php";
$nombrePagina = "Actores";

// Desclara Variables

$nombreActor = $_POST['nombreActor'] ?? "";
$apellidoActor = $_POST['apellidoActor'] ?? "";


try {// asegurarno del que usuario alga hecho click en el boton
    if (isset($_POST['guardar_actor'])) {
        // codigo para guarda base de datos
        echo "se va a guardar los datos...";

        // Validar los datos
        if (empty($nombreActor)) {
            throw new Exception("El nombre no puede estar vacio");
        }

        if (empty($apellidoActor)) {
            throw new Exception("El apellido no puede estar vacio");

        }
        // para el array con lo datos
        $datos = compact('nombreActor', 'apellidoActor');

        // insertar datos
        $actorIncertado = insertarActores($conexion, $datos);
        $mensaje = "Los datos sean guardado correctamente";


        // lanzar un error si no se inserto correctamente
        if (!$actorIncertado) {
            throw new Exception("Ocurrio uun error al insertar los datos del actor");
        }

        // Redicionar la pagina
        redireccionar("actor.php");
    }


    // Asegurarns que el usuario haya echo cick en el boton de eliminar
    if (isset($_POST['eliminarActor'])) {
        $idActor = $_POST['eliminarActor'] ?? "";
        // validar
        if (empty($idActor)) {
            throw new Exception("El id de Actor no puede estar vacio");
        }
        // preparar array
        $datos = compact('idActor');

        // eliminar
        $eliminado = eliminarActores($conexion, $datos);
        $mensaje = "los datos fueron eliminados correctamente";

        // lanzar error
        if (! $eliminado ) {
            throw new Exception("los datos no se eliminaron correctamente");
        }
        // Re-direccionar
         redireccionar("actor.php");
    }



} catch (Exception $e) {
    $error = $e->getMessage();
}

// cargar los datos

$actores = obtenerActores($conexion);


// incluir actor

include_once "vistas/vista_actor.php";