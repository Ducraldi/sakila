<?php

require_once "funciones/ayudante.php";
require_once "modelos/modelo_ciudad.php";
require_once "modelos/modelo_pais.php";
$nombrePagina = "Ciudad";


// Desclarar variables
$ciudadPrincipal = $_POST['ciudadPrincipal'] ?? "";
$selecionPais = $_POST['selecionPais'] ?? "";


// asegurarno del que usuario alga hecho click en el boton

try {
    if (isset($_POST['guardar_ciudad'])) {
        // codigo para guarda base de datos
        echo "se va a guardar los datos...";

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
        $ciudadInsertada = insertarCiudades($conexion, $datos);
        $mensaje = "Los datos sean guardado correctamente";
        // lanzar error si no se han insertados los datos
        if (!$ciudadInsertada) {
            throw new Exception("Ha ocurrido un erro al insertar los datos de la ciudad");
        }

        // redireccionar la pagina
        redireccionar("ciudad.php");
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}

// incluid conexiones
$ciudades = obtenerCiudades($conexion);
$paises = obtenerPaises($conexion);

// incluir vista
include_once "vistas/vista_ciudad.php";