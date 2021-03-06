<?php

require_once "funciones/ayudante.php";
require_once "modelos/modelo_ciudad.php";
require_once "modelos/modelo_pais.php";
$nombrePagina = "Ciudades";


// Desclarar variables
$idCiudad = $_POST['idCiudad'] ?? "";
$ciudadPrincipal = $_POST['ciudadPrincipal'] ?? "";
$selecionPais = $_POST['selecionPais'] ?? "";

// asegurarno del que usuario alga hecho click en el boton

try {
    if (isset($_POST['guardar_ciudad'])) {
        // codigo para guarda base de datos
        // echo "se va a guardar los datos...";

        // validar los datos
        if (empty($ciudadPrincipal)) {
            throw new Exception("El nombre de la ciudad esta vacio");
        }

        if (empty($selecionPais)) {
            throw new Exception("Selecione un pais");
        }

        // preparar los array con los datos
        $datos = compact('ciudadPrincipal', 'selecionPais');

        // insertar datos
        if (empty($idCiudad)) {
            $ciudadInsertada = insertarCiudades($conexion, $datos);
            $mensaje = "Los datos sean guardado correctamente";// lanzar error si no se han insertados los datos
            if (!$ciudadInsertada) {
                throw new Exception("Ha ocurrido un erro al insertar los datos de la ciudad");
            }
        } else {
            // Agregar el id al array datos
            $datos['idCiudad'] = $idCiudad;

            // Actualizar datos
            $ciudadEditado = editarCiudades($conexion, $datos);
            $mensaje = "Los datos fueron editado correctamente";

            if (!$ciudadEditado) {
                throw new Exception("Ocurrio un error al editar los datos");
            }
        }

        // redireccionar la pagina
        redireccionar("ciudad.php");
    }
    // Asegurarns que el usuario haya echo cick en el boton de eliminar
    if (isset($_POST['eliminarCiudad'])) {
        $idCiudad = $_POST['eliminarCiudad'] ?? "";

        // validar
        if (empty($idCiudad)) {
            throw new Exception("El id de Ciudad no puede estar vacio");
        }
        // preparar array
        $datos = compact('idCiudad');

        // eliminar
        $eliminado = eliminarCiudades($conexion, $datos);
        $mensaje = "los datos fueron eliminados correctamente";

        // lanzar error
        if (!$eliminado) {
            throw new Exception("los datos no se eliminaron correctamente");
        }
        // Re-direccionar
        redireccionar("ciudad.php");
    }

    if (isset($_POST['editarCiudad'])) {
        $idCiudad = $_POST['editarCiudad'] ?? "";

        if (empty($idCiudad)) {
            throw new Exception("el id del Ciudad no puede estar vacio");
        }

        $datos = compact('idCiudad');

        $resultado = obtenerCiudadPorId($conexion, $datos);
        $ciudadPrincipal = $resultado['city'];
        $selecionPais = $resultado['country_id'];

    }


} catch (Exception $e) {
    $error = $e->getMessage();
}

// incluid conexiones
$ciudades = obtenerCiudades($conexion);
$paises = obtenerPaises($conexion);

// incluir vista
include_once "vistas/vista_ciudad.php";