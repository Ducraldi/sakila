<?php
// Definir la funcion para el manejo de errores
function reportarErrores($numero, $mensaje, $archivo, $linea)
{
    $codigos = [
        1 => "Error fatal",
        2 => "Advertencia",
        8 => "Aviso",
    ];

    echo "<div class=\"alert alert-warning\" role=\"alert\">
          <h4 class=\"alert-heading\">{$codigos[$numero]}</h4>
          <p>{$mensaje}</p>
          <hr>
          <span>En la línea <b>{$linea}</b> del archivo <b>{$archivo}</b></span>
        </div>";
}

set_error_handler('reportarErrores');

function reportarExcepciones($exception)
{
    echo "<link rel=\"stylesheet\" href=\"static/css/bootstrap.min.css\">";

    echo "<div class=\"alert alert-danger\" role=\"alert\">
          <h4 class=\"alert-heading\">Ha ocurrido una excepción</h4>
          <p>{$exception->getMessage()}</p>
          <hr>
          <span>En la línea <b>{$exception->    getLine()}</b> del archivo <b>{$exception->getFile()}</b></span>
        </div>";
}

set_exception_handler('reportarExcepciones');


function imprimirArray($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}


function redireccionar($ruta)
{
    header("Location: $ruta", true, 303);
}
