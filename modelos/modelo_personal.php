<?php

require_once "config/conexion.php";

function obtenerPersonal($conexion)
{
    $sql = "SELECT sta.staff_id,                                              
       sta.first_name,                                            
       sta.last_name,                                             
       CONCAT(sta.first_name, ' ', sta.last_name) AS name,        
       sta.picture,
       LOWER(sta.email) AS email,
       ad.address,
       sta.active,
       IF (sta.active = 1, 'Si', 'No') AS activo,
       sta.username,
       sta.password,
       sta.store_id,
       sta.last_update,                                            
       DATE_FORMAT(sta.last_update, '%d/%m/%Y %l%i:%p' ) AS fecha 
       FROM staff AS sta                                          
        left join store AS sto  on sta.store_id = sto.store_id    
        left join address AS ad on sta.address_id = ad.address_id;";

    return $conexion->query($sql)->fetchAll();
}

function intesertarPersonal($conexion, $datos)
{
    $sql = "INSERT INTO staff (first_name, 
                   last_name,
                   active,
                   address_id,
                   picture, 
                   email, 
                   store_id, 
                   username, 
                   password) 
                VALUES (:nombrePersonal, 
                       :apellidoPersonal, 
                       :activadorPersonal,
                       :direccionPersonal, 
                       :imagenPersonal, 
                       :emailPersonal, 
                       :tiendaPersonal, 
                       :usuarioPersonal, 
                       :contrasenaPersonal);";

    return ($conexion)->prepare($sql)->execute($datos);


}

function eliminarPersonal($conexion, $datos)
{
    $sql = "UPDATE payment SET staff_id = 1 WHERE staff_id = :idPersonal ;
            DELETE FROM staff WHERE staff_id = :idPersonal ;";

    return $conexion->prepare($sql)->execute($datos);
}