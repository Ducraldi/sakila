<nav class="nav flex-column">

<?php


$paginaMenu = [
    "index"       => ["Inicio", "fas fa-home"],
    "actor"       => ["Actores", "fas fa-user"],
    "direcciones" => ["Direcciones", "fas fa-map-marker-alt"],
    "ciudad"      => ["Ciudades", "fas fa-city"],
    "pais"        => ["País", "fas fa-flag"],
    "categoria"   => ["Categorias", "fas fa-tag"],
    "cliente"     => ["Clientes", "fas fa-user-tag"],
    "pelicula"    => ["Peliculas", "fas fa-play"],
    "idioma"      => ["Idiomas", "fas fa-language"],
    "personal"    => ["Personales", "fas fa-user-shield"],
    "tienda"      => ["Tiendas", "fas fa-shopping-cart"]
];


foreach ($paginaMenu as $nombreArchivo => $pagina) {
    $iconos = $pagina[1];
    $textoPagina = $pagina[0];
    echo "<nav class=\"nav flex-column\">
   <div class=\"mb-3 btn btn-dark\"><a class=\"nav-link\" href=\"{$nombreArchivo}.php\">
            <i class=\"{$iconos}\"></i>
            {$textoPagina}
        </a></div>";

}

?>