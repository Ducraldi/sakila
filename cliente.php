<?php
require_once "funciones/ayudante.php";
require_once "modelos/modelo_cliente.php";
require_once "modelos/modelo_personal.php";
require_once "modelos/modelo_direcciones.php";
$nombrePagina = "Clientes";

// Incluid los modelos
require_once "modelos/modelo_tiendas.php";


$nombreCliente = $_POST['nombreCliente'] ?? "";
$apellidoCliente = $_POST['apellidoCliente'] ?? "";
$correoCliente = $_POST['correoCliente'] ?? "";
$tiendaCliente = $_POST['tiendaCliente'] ?? "";
$direccionCliente = $_POST['direccionCliente'] ?? "";
if (isset($_POST['activadorCliente'])) {
    $activadorCliente = 1;
} else {
    $activadorCliente = 0;
}


imprimirArray($_POST);
// asegurarno del que usuario alga hecho click en el boton

try {
    if (isset($_POST['guardar_cliente'])) {
        // codigo para guarda base de datos
        echo "se va a guardar los datos...";

        // vamos a insertar
        if (empty($nombreCliente)) {
            throw new Exception("El nombre no puede estar vacio");
        }

        if (empty($apellidoCliente)) {
            throw new Exception("El apellido no puede estar vacio");
        }

        if (empty($tiendaCliente)) {
            throw new Exception("La tienda no puede estar vacia");
        }

        if (empty($correoCliente)) {
            throw new Exception("El correo no puede estar vacio");
        }

        if (empty($direccionCliente)) {
            throw new Exception("La direccion no puede estar vacia");
        }

        $datos = compact('nombreCliente',
            'apellidoCliente',
            'correoCliente',
            'direccionCliente',
            'tiendaCliente',
            'activadorCliente');

        $clienteIncertado = insertarClientes($conexion, $datos);
        $mensaje = "Los datos sean guardado correctamente";

        // lanzar un error si no se inserto correctamente
        if (!$clienteIncertado) {
            throw new Exception("Ocurrio uun error al insertar los datos del actor");
        }

        // Redicionar la pagina
        redireccionar("cliente.php");


    }

    // Asegurarns que el usuario haya echo cick en el boton de eliminar
    if (isset($_POST['eliminarCliente'])) {
        $idCliente = $_POST['eliminarCliente'] ?? "";

        // validar
        if (empty($idCliente)) {
            throw new Exception("El id de Cliente no puede estar vacio");
        }
        // preparar array
        $datos = compact('idCliente');

        // eliminar
        $eliminado = eliminarClientes($conexion, $datos);
        $mensaje = "los datos fueron eliminados correctamente";

        // lanzar error
        if (!$eliminado) {
            throw new Exception("los datos no se eliminaron correctamente");
        }
        // Re-direccionar
        redireccionar("cliente.php");
    }

} catch (Exception $e) {
    $error = $e->getMessage();
}

$todaDirecciones = obtenerDirecciones($conexion);
$datosClientes = obtenerClientes($conexion);
$tiendasClientes = obtenerTiendas($conexion);

// incluir la vista
include_once "vistas/vista_cliente.php";