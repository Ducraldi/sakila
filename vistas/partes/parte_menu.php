<nav class="nav flex-column">

<?php


$paginaMenu = [
    "index"       => ["Inicio", "fas fa-home"],
    "actor"       => ["Actor", "fas fa-user"],
    "direcciones" => ["Direcciones", "fas fa-map-marker-alt"],
    "ciudad"      => ["Ciudad", "fas fa-city"],
    "pais"        => ["País", "fas fa-flag"],
    "categoria"   => ["Categoria", "fas fa-tag"],
    "cliente"     => ["Clientes", "fas fa-user-tag"],
    "pelicula"    => ["Pelicula", "fas fa-play"],
    "idioma"      => ["Idioma", "fas fa-language"],
    "personal"    => ["Personal", "fas fa-user-shield"],
    "tienda"      => ["Tienda", "fas fa-shopping-cart"]
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