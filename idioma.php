<?php
$nombrePagina = "Idioma";


// Desclar Variables
$nombreIdioma = $_POST['nombreIdioma'] ?? "";

// asegurarno del que usuario alga hecho click en el boton

if (isset($_POST['guardar_idioma'])) {
    // codigo para guarda base de datos
    echo "se va a guardar los datos...";
}


// incluir  vista

include_once "vistas/vista_idioma.php";