<?php

require_once "funciones/ayudante.php";
require_once "modelos/modelo_direcciones.php";
require_once "modelos/modelo_ciudad.php";
$nombrePagina = "Direcciones";


// Incluid los modelos


$direccionPrincipal = $_POST['direccionPrincipal'] ?? "";
$direccionSecundaria = $_POST['direccionSecundaria'] ?? "";
$distrito = $_POST['distrito'] ?? "";
$ciudad = $_POST['ciudad'] ?? "";
$codigoPostal = $_POST['codigoPostal'] ?? "";
$telefono = $_POST['telefono'] ?? "";
$idDireccion = $_POST['eliminarDirecion'] ?? "";


// asegurarno del que usuario alga hecho click en el boton
try {
    if (isset($_POST['guardar_direccion'])) {
        // codigo para guarda base de datos
        // echo "se va a guardar los datos...";

        if (empty($direccionPrincipal)) {
            throw new Exception("La direccion principal no puede estar vacia");
        }

        if (empty($distrito)) {
            throw new Exception("El distrito no puede estar vacio");
        }

        if (empty($ciudad)) {
            throw new Exception("La ciudad no puede estar vacia");
        }

        if (empty($codigoPostal)) {
            throw new Exception("El codigo postal no puede estar vacio");
        }

        if (empty($telefono)) {
            throw new Exception("El numero de telefono no puede estar vacio");
        }

        // preparar los array con los datos
        $datos = compact('direccionPrincipal', 'direccionSecundaria', 'distrito', 'ciudad', 'codigoPostal', 'telefono');

        // insertar datos
        $direccionInsertada = insertarDirecciones($conexion, $datos);
        $mensaje = "Los datos sean guardado correctamente";
        // lanzar error si no se han insertados los datos
        if (!$direccionInsertada) {
            throw new Exception("Ha ocurrido un erro al insertar los datos de la ciudad");
        }

        // redireccionar la pagina
        redireccionar("direcciones.php");
    }

    // Asegurarns que el usuario haya echo cick en el buuboton de eliminar
    if (isset($_POST['eliminarDireccion'])) {
        $idDireccion = $_POST['eliminarDireccion'] ?? "";

        // validar
        if (empty($idDireccion)) {
            throw new Exception("El id de Direciones no puede estar vacio");
        }
        // preparar array
        $datos = compact('idDireccion');

        // eliminar
        $eliminado = eliminarDirecciones($conexion, $datos);
        $mensaje = "los datos fueron eliminados correctamente";

        // lanzar error
        if (!$eliminado) {
            throw new Exception("los datos no se eliminaron correctamente");
        }
        // Re-direccionar
        redireccionar("direcciones.php");
    }


} catch (Exception $e) {
    $error = $e->getMessage();
}

$todasDirecciones = obtenerDirecciones($conexion);
$ciudades = obtenerCiudades($conexion);
// incluir vista
include_once "vistas/vista_direcciones.php";