<?php
require_once "funciones/ayudante.php";
require_once "modelos/modelo_cliente.php";

$nombrePagina = "Clientes";

// Incluid los modelos
require_once "modelos/modelo_tiendas.php";


$nombreCliente = $_POST['nombreCliente'] ?? "";
$apellidoCliente = $_POST['apellidoCliente'] ?? "";
$tiendaCliente = $_POST['tiendaCliente'] ?? "";
$direccionCliente = $_POST['direccionCliente'] ?? "";
$activadorCliente = $_POST['activadorCliente'] ?? "";

// asegurarno del que usuario alga hecho click en el boton

if (isset($_POST['guardar_cliente'])) {
    // codigo para guarda base de datos
    echo "se va a guardar los datos...";
}

$datosClientes = obtenerClientes($conexion);
$tiendasClientes = obtenerTodasTiendas($conexion);
$direccionesClientes = obtenerTodasTiendas($conexion);

// incluir la vista
include_once "vistas/vista_cliente.php";