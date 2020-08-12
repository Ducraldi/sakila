<?php
$nombrePagina = "Pais";
require_once "funciones/ayudante.php";
require_once "modelos/modelo_pais.php";

// Desclar Variables
$pais = $_POST['pais'] ?? "";

// asegurarno del que usuario alga hecho click en el boton

try {
    if (isset($_POST['guardar_pais'])) {
        // codigo para guarda base de datos
        echo "se va a guardar los datos...";

        if (empty($pais)) {
            throw new Exception("El pais no puede estar vacio");
        }

        $datos = compact('pais');

        $paisesIncertado = incertarPaises($conexion, $datos);
        $mensaje = "Los datos sean guardado correctamente";

        // lanzar un error si no se inserto correctamente
        if (!$paisesIncertado) {
            throw new Exception("Ocurrio un error al insertar los datos del actor");
        }

        // Redicionar la pagina
        redireccionar("pais.php");

    }

    // Asegurarns que el usuario haya echo cick en el boton de eliminar
    if (isset($_POST['eliminarPais'])) {
        $idPais = $_POST['eliminarPais'] ?? "";

        // validar
        if (empty($idPais)) {
            throw new Exception("El id de Pais no puede estar vacio");
        }
        // preparar array
        $datos = compact('idPais');

        // eliminar
        $eliminado = eliminarPaises($conexion, $datos);
        $mensaje = "los datos fueron eliminados correctamente";

        // lanzar error
        if (!$eliminado) {
            throw new Exception("los datos no se eliminaron correctamente");
        }
        // Re-direccionar
        redireccionar("pais.php");
    }


} catch (Exception $e) {
    $error = $e->getMessage();
}


$paises = obtenerPaises($conexion);

// incluir  vista

include_once "vistas/vista_pais.php";