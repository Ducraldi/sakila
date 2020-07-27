<?php
function obtenerClientes($conexion)
{
    $sql = "SElECT c.customer_id,
       c.store_id,
       c.first_name,
       c.last_name,
       CONCAT(c.first_name, ' ', c.last_name) AS name,
       c.email,
       c.address_id,
       c.create_date,
       DATE_FORMAT(c.create_date, '%d/%m/%Y %l:%i %p' ) AS fecha,
       a.address,
       IF(c.active = 1, 'Si', 'No') AS activo,
       c.active
FROM customer As c
LEFT JOIN store AS s on c.store_id = s.store_id
LEFT JOIN address AS a on c.address_id = a.address_id
ORDER BY c.first_name ASC
;";

    return $conexion->query($sql)->fetchAll();
}