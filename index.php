<?php
require_once "funciones/ayudante.php";

// Inclluir modelos

require_once "modelos/modelo_actor.php";

$actores = obtenerActores($conexion);


$nombrePagina = "Principal";


/*
$nombre = "";
$edad = "";
$ciudad = "";
$q = "";

$nombre = $_POST['nombre'] ?? "";

$edad = $_POST['edad'] ?? "";

$ciudad = $_POST['ciudad'] ?? "";

$q = $_POST['q'] ?? "";

$monto = $_POST['monto'] ?? "";
*/

// incluir la vista
include_once "vistas/vista_principal.php";

