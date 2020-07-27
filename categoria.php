<?php

$nombrePagina = "Categoria";
// Declarar Variables

$nombreCategoria = $_POST['nombreCategoria'] ?? "";

// asegurarno del que usuario alga hecho click en el boton

if (isset($_POST['guardar_categoria'])) {
    // codigo para guarda base de datos
    echo "se va a guardar los datos...";
}

// incluir  vista

include_once "vistas/vistas_categoria.php";