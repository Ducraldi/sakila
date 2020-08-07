<?php
// Incluid los modelos
require_once "modelos/modelo_personal.php";
require_once "modelos/modelo_direcciones.php";
require_once "funciones/ayudante.php";
$nombrePagina = "Pesonal";




$nombrePersonal = $_POST['nombrePersonal'] ?? "";
$apellidoPersonal = $_POST['apellidoPersonal'] ?? "";
$direccionPersonal = $_POST['direccionPersonal'] ?? "";
$imagenPersonal = $_POST['imagenPersonal'] ?? "";
$emailPersonal = $_POST['emailPersonal'] ?? "";
$tiendaPersonal = $_POST['tiendaPersonal'] ?? "";
$usuarioPersonal = $_POST['usuarioPersonal'] ?? "";
$activarPersonal = $_POST['activarPersonal'] ?? "";
$contrasenaPersonal = $_POST['contrasenaPersonal'] ?? "";

// asegurarno del que usuario alga hecho click en el boton
imprimirArray($_POST);

try {
    if (isset($_POST['guardar_personal'])) {
        // codigo para guarda base de datos
        echo "se va a guardar los datos...";

        if (empty($nombrePersonal)) {
            throw new Exception("El nombre no puede estar vacio");
        }

        if (empty($apellidoPersonal)) {
            throw new Exception("El aprellido no puede estar vacio");
        }

        if (empty($direccionPersonal)) {
            throw new Exception("La dirrecion no puede estar vacia");
        }

        if (empty($imagenPersonal)) {
            throw new Exception("La imagen no puede estar vacia");
        }

        if (empty($emailPersonal)) {
            throw new Exception("El correo electronico no puede estar vacio");
        }

        if (empty($tiendaPersonal)) {
            throw new Exception("La tienda no puede estar vacia ");
        }

        if (empty($usuarioPersonal)) {
            throw new Exception("El usuario no puede estar vacio");
        }

        if (empty($contrasenaPersonal)) {
            throw new Exception("Escriba su contraceña bien ");
        }

        $datos = compact('nombrePersonal', 'apellidoPersonal',  'direccionPersonal', 'imagenPersonal', 'emailPersonal', 'activarPersonal', 'tiendaPersonal', 'usuarioPersonal', 'contrasenaPersonal');


        $personalIncertado = intesertarPersonal($conexion, $datos);
        $mensaje = "Los datos sean guardado correctamente";

        // lanzar un error si no se inserto correctamente
        if (!$personalIncertado) {
            throw new Exception("Ocurrio un error al insertar los datos del actor");
        }

        // Redicionar la pagina
        redireccionar("personal.php");
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}

$todaDirecciones = obtenerDirecciones($conexion);
$personales = obtenerPersonal($conexion);

// incluir la vista
include_once "vistas/vista_personal.php";