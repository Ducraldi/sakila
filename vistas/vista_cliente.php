<?php include_once "partes/parte_head.php" ?>

<body class="inci">
<?php include_once "partes/parte_menu_principal.php" ?>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <?php include_once "partes/parte_menu.php" ?>
        </div>
        <div class="col-md-10">
            <h3><?php echo "$nombrePagina"; ?></h3>
            <div class="row">
                <div class="col-md-3">
                    <form class="lolo" action="cliente.php" method="post">
                        <div class="mb-3">
                            <label for="nombreCliente">Nombre del Clinte</label>
                            <input type="text" name="nombreCliente" id="nombreCliente" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="apellidoCliente">Apellido del Cliente</label>
                            <input type="text" name="apellidoCliente" id="apellidoCliente" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="emailCliente">Escribe el correo del cliente</label>
                            <div class="input-group mb-3">
                                <input type="text" name="emailCliente" id="emailCliente" class="form-control"
                                       placeholder="Escribe tu nombre" aria-label="Recipient's username"
                                       aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="emailCliente">@gmail.com</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="tiendaCliente">Seleccione una Tienda</label>
                            <select name="tiendaCliente" id="tiendaCliente" class="custom-select">
                                <option value="">Aqui va el listado de la tienda dede SQL</option>

                                <?php

                                foreach ($tiendasClientes as $tiendas) {
                                    echo "  <option value=\"{$tiendas["store_id"]}\">{$tiendas["store_id"]}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="direccionCliente">Seleccione una Direccion</label>
                            <select name="direccionCliente" id="direccionCliente" class="custom-select">
                                <option value="">Aqui va el listado de la direccion dede SQL</option>

                                <?php

                                foreach ($direccionesClientes as $direcciones) {

                                    echo "<option value=\"{$direcciones["store_id"]}\">{$direcciones["address_id"]}</option>";
                                }
                                ?>


                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="direccionCliente">Seleccione una Direccion</label>
                            <select name="direccionCliente" id="direccionCliente" class="custom-select">
                                <option value="">Aqui va el listado de la direccion dede SQL</option>

                                <?php

                                foreach ($direccionesClientes as $direcciones) {

                                    echo "<option value=\"{$direcciones["store_id"]}\">{$direcciones["address_id"]}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <input type="checkbox" id="activadorCliente" name="activadorCliente"
                                   value="activadorCliente">
                            <label for="activadorCliente">Activo</label><br>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="guardar_cliente" class="btn btn-primary">Enviar Datos</button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="row">
                <div class="colorTabla col-md-12">
                    <table class="table table-sm table-dark">
                        <thead>
                        <tr class=>
                            <th scope="col">ID</th>
                            <th scope="col">Tienda</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Activo</th>
                            <th scope="col">Fecha</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        foreach ($datosClientes as $cliente) {
                            if ($cliente['active'] == '1') {
                                $icono = '<i class=\'fas fa-check text-success\'></i> ';
                            } else {
                                $icono = '<i class=\'fas fa-times text-danger\'></i>  ';
                            }
                            echo "<tr class=\"bg-primary\">
                              <th scope=\"row\">{$cliente['customer_id']}</th>
                              <td>{$cliente['store_id']}</td>
                              <td>" . ucwords(strtolower($cliente['name'])) . "</td>
                              <td>{$cliente['email']}</td>
                              <td>{$cliente['address']}</td>
                              <td>{$cliente['activo']} {$icono}</td>
                              <td>{$cliente['fecha']}</td>
                          </tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
</body>
</html>