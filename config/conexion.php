<?php


// Valores de mis base de datos locales     (mi pc)
$host = "localhost";
$dbname = "sakila";
$username = "root";
$passwd = "dubaldycom24";


// valores de la base de datos 000webhost
if ($_SERVER['SERVER_NAME'] == 'duqui.000webhostapp.com') {
    $host = "localhost";
    $dbname = "id12550977_sakila";
    $username = "id12550977_ducraldi_000webhost";
    $passwd = "MHE?iiLSoV{iJQO5";
}

$ajustes = [
    19 => 2, // devuelve un array con los nombres de las columna de los resultados de la BD
    3  => 2 // Nos Genera excepciones cuando hay errores  en los querys
];

try {
    $conexion = new PDO("mysql:host={$host};dbname={$dbname}", "{$username}", "{$passwd}", $ajustes);
} catch (PDOException $exception) {
    throw new Exception("Hubo un error al conectaronos a la base de datos: {$exception->getMessage()}");
}
