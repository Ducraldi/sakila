<?php
// Incluid los modelos
require_once "modelos/modelo_personal.php";
require_once "modelos/modelo_direcciones.php";
require_once "funciones/ayudante.php";
$nombrePagina = "Pesonales";




$nombrePersonal = $_POST['nombrePersonal'] ?? "";
$apellidoPersonal = $_POST['apellidoPersonal'] ?? "";
$direccionPersonal = $_POST['direccionPersonal'] ?? "";
$imagenPersonal = $_POST['imagenPersonal'] ?? "";
$emailPersonal = $_POST['emailPersonal'] ?? "";
$tiendaPersonal = $_POST['tiendaPersonal'] ?? "";
$usuarioPersonal = $_POST['usuarioPersonal'] ?? "";
if (isset($_POST['activadorPersonal'])) {
    $activadorPersonal = 1;
} else {
    $activadorPersonal = 0;
}
$contrasenaPersonal = $_POST['contrasenaPersonal'] ?? "";



// asegurarno del que usuario alga hecho click en el boton
try {
    if (isset($_POST['guardar_personal'])) {
        // codigo para guarda base de datos
        // echo "se va a guardar los datos...";

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

        if (empty($usuarioPersonal)) {
            throw new Exception("El usuario no puede estar vacio");
        }

        if (empty($contrasenaPersonal)) {
            throw new Exception("Escriba su contraceña bien ");
        }

        $datos = compact('nombrePersonal',
            'apellidoPersonal',
            'activadorPersonal',
            'direccionPersonal',
            'imagenPersonal',
            'emailPersonal',

            'tiendaPersonal',
            'usuarioPersonal',
            'contrasenaPersonal');


        $personalIncertado = intesertarPersonal($conexion, $datos);
        $mensaje = "Los datos sean guardado correctamente";

        // lanzar un error si no se inserto correctamente
        if (!$personalIncertado) {
            throw new Exception("Ocurrio un error al insertar los datos del actor");
        }

        // Redicionar la pagina
        redireccionar("personal.php");
    }

    // Asegurarns que el usuario haya echo cick en el boton de eliminar
    if (isset($_POST['eliminarPersonal'])) {
        $idPersonal = $_POST['eliminarPersonal'] ?? "";

        // validar
        if (empty($idPersonal)) {
            throw new Exception("El id de Pelsonal no puede estar vacio");
        }
        // preparar array
        $datos = compact('idPersonal');

        // eliminar
        $eliminado = eliminarPersonal($conexion, $datos);
        $mensaje = "los datos fueron eliminados correctamente";

        // lanzar error
        if (!$eliminado) {
            throw new Exception("los datos no se eliminaron correctamente");
        }
        // Re-direccionar
        redireccionar("personal.php");
    }

} catch (Exception $e) {
    $error = $e->getMessage();
}

$todaDirecciones = obtenerDirecciones($conexion);
$personales = obtenerPersonal($conexion);

// incluir la vista
include_once "vistas/vista_personal.php";