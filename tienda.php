<?php

require_once "funciones/ayudante.php";
$nombrePagina = "Tienda";

// Incluid los modelos

require_once "modelos/modelo_personal.php";
require_once "modelos/modelo_tiendas.php";


$gerenteTienda = $_POST['gerenteTienda'] ?? "";
$direccionTienda = $_POST['direccionTienda'] ?? "";


// asegurarno del que usuario alga hecho click en el boton

try {
    if (isset($_POST['guardar_tienda'])) {
        // codigo para guarda base de datos
        echo "se va a guardar los datos...";

        // validar los datos
        if (empty($gerenteTienda)) {
            throw new Exception("El nombre de gerente");
        }

        if (empty($direccionTienda)) {
            throw new Exception("Selecione una tienda");
        }

        // preparar los array con los datos
        $datos = compact('gerenteTienda', 'direccionTienda');

        // insertar datos
        $tiendaInsertada = insertarTiendas($conexion, $datos);
        $mensaje = "Los datos sean guardado correctamente";

        // lanzar error si no se han insertados los datos
        if (!$tiendaInsertada) {
            throw new Exception("Ha ocurrido un error al insertar los datos de la ciudad");
        }

        // redireccionar la pagina
        redireccionar("tienda.php");
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}


$datosTienda = obtenerTiendas($conexion);
$nombrePersonales = obtenerPersonal($conexion);
$direccionesTiendas = obtenerTiendas($conexion);

// incluir  vista

include_once "vistas/vista_tienda.php";