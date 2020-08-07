<?php
require_once "modelos/modelo_categoria.php";
require_once "funciones/ayudante.php";
$nombrePagina = "Categoria";

// Declarar Variables
$nombreCategoria = $_POST['nombreCategoria'] ?? "";

// asegurarno del que usuario alga hecho click en el boton
try {
    if (isset($_POST['guardar_categoria'])) {
        // codigo para guarda base de datos
        echo "se va a guardar los datos...";

        if (empty($nombreCategoria)) {
            throw new Exception("El nombre de la categroia no puede estar vacio");
        }
        // para el array con lo datos
        $datos = compact('nombreCategoria');

        $categoriaIncertado = insertarCategoria($conexion, $datos);
        $mensaje = "Los datos sean guardado correctamente";

        // lanzar un error si no se inserto correctamente
        if (!$categoriaIncertado) {
            throw new Exception("Ocurrio uun error al insertar los datos de categoria");
        }

        // Redicionar la pagina
        redireccionar("categoria.php");
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}


$categorias = obtenerCategoria($conexion);

// incluir  vista

include_once "vistas/vistas_categoria.php";