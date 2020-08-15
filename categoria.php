<?php
require_once "modelos/modelo_categoria.php";
require_once "funciones/ayudante.php";
$nombrePagina = "Categorias";

// Declarar Variables
$idCategoria = $_POST['idCategoria'] ?? "";
$nombreCategoria = $_POST['nombreCategoria'] ?? "";

// asegurarno del que usuario alga hecho click en el boton
try {
    if (isset($_POST['guardar_categoria'])) {
        // codigo para guarda base de datos
        // echo "se va a guardar los datos...";

        if (empty($nombreCategoria)) {
            throw new Exception("El nombre de la categroia no puede estar vacio");
        }
        // para el array con lo datos
        $datos = compact('nombreCategoria');

        if (empty($categoria)) {
            $categoriaIncertado = insertarCategoria($conexion, $datos);
            $mensaje = "Los datos sean guardado correctamente";// lanzar un error si no se inserto correctamente
            if (!$categoriaIncertado) {
                throw new Exception("Ocurrio uun error al insertar los datos de categoria");
            }
        } else {
            // Agregar el id al array datos
            $datos['idCategoria'] = $idCategoria;

            // Actualizar datos
            $categoriaEditado = editarCategorias($conexion, $datos);
            $mensaje = "Los datos fueron editado correctamente";

            if (!$categoriaEditado) {
                throw new Exception("Ocurrio un error al editar los datos");
            }
        }

        // Redicionar la pagina
        redireccionar("categoria.php");
    }

    // Asegurarns que el usuario haya echo cick en el boton de eliminar
    if (isset($_POST['eliminarCategoria'])) {
        $idCategoria = $_POST['eliminarCategoria'] ?? "";

        // validar
        if (empty($idCategoria)) {
            throw new Exception("El id de Categoria no puede estar vacio");
        }
        // preparar array
        $datos = compact('idCategoria');

        // eliminar
        $eliminado = eliminarCategoria($conexion, $datos);
        $mensaje = "los datos fueron eliminados correctamente";

        // lanzar error
        if (!$eliminado) {
            throw new Exception("los datos no se eliminaron correctamente");
        }
        // Re-direccionar
        redireccionar("categoria.php");
    }

    if (isset($_POST['editarCategoria'])) {
        $idCategoria = $_POST['editarCategoria'] ?? "";

        if (empty($idCategoria)) {
            throw new Exception("el id del Actor no puede estar vacio");
        }

        $datos = compact('idCategoria');

        $resultado = obtenerCategoriaPorId($conexion, $datos);
        $nombreCategoria = $resultado['name'];

    }


} catch (Exception $e) {
    $error = $e->getMessage();
}


$categorias = obtenerCategoria($conexion);

// incluir  vista

include_once "vistas/vistas_categoria.php";