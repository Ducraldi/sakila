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
                <div class="col-md-5">
                    <form class="lolo" action="cliente.php" method="post">
                        <div class="mb-3">
                            <label for="nombreCliente">Nombre del Clinte</label>
                            <input type="text" value="<?= $nombreCliente ?>"placeholder="Escribe el nombre" name="nombreCliente" id="nombreCliente" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="apellidoCliente">Apellido del Cliente</label>
                            <input type="text" name="apellidoCliente" value="<?= $apellidoCliente ?>" placeholder="Escribe el apellido" id="apellidoCliente" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="correoCliente">Escribe el correo del cliente</label>
                            <div class="input-group mb-3">
                                <input type="text" name="correoCliente" id="correoCliente" class="form-control"
                                       placeholder="Escribe tu correo electronico" aria-label="Recipient's username"
                                       aria-describedby="basic-addon2">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="tiendaCliente">Seleccione una Tienda</label>
                            <select name="tiendaCliente" id="tiendaCliente" class="custom-select">
                                <option value="">Aqui va el listado de la tienda dede SQL</option>

                                <?php

                                foreach ($tiendasClientes as $tiendas) {
                                    echo "  <option value=\"{$tiendas["store_id"]}\">{$tiendas["first_name"]}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="direccionCliente">Seleccione una Direccion</label>
                            <select name="direccionCliente" id="direccionCliente" class="custom-select">
                                <option value="">Aqui va el listado de la direccion dede SQL</option>

                                <?php

                                foreach ($todaDirecciones as $direcciones) {

                                    echo "<option value=\"{$direcciones["address_id"]}\">{$direcciones["address"]}</option>";
                                }
                                ?>


                            </select>
                        </div>


                        <div class="mb-3">
                            <input type="checkbox" id="activadorCliente" name="activadorCliente"
                                   value="activadorCliente[]">
                            <label for="activadorCliente">Activo</label><br>
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="guardar_cliente" class="btn btn-primary"><i class="fas fa-save">
                                    Enviar</i></button>
                        </div>
                    </form>
                    <?php
                    if (isset($error)) {
                        echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                                {$error}
                                 <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                  </button>
                                </div>";
                    }

                    if (isset($mensaje)) {
                        echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                                  {$mensaje}
                                 <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                  </button>
                                </div>";
                    }
                    ?>

                </div>
            </div>
            <hr>
            <?php
            if (empty($datosClientes)) {
                include_once "partes/parte_empty.php";
            } else { ?>
                <div class="row">
                    <div class="colorTabla col-md-12">
                        <form action="" method="post">
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
                                    <th>Acciones</th>
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
                                    echo "<tr class=\"bg-secondary\">
                                                  <th scope=\"row\">{$cliente['customer_id']}</th>
                                                  <td>{$cliente['manager_staff_id']}</td>
                                                  <td>" . ucwords(strtolower($cliente['name'])) . "</td>
                                                  <td>{$cliente['email']}</td>
                                                  <td>{$cliente['address']}</td>
                                                  <td>{$cliente['activo']} {$icono}</td>
                                                  <td>{$cliente['fecha']}</td>
                                                  <td>
                                                  <button class='btn btn-outline-danger btn-sm' value='' name='eliminarCliente' title='Eliminar'><i class='fas fa-trash'></i></button>
                                                  <button class='btn btn-outline-success btn-sm' value='' name='edictarCliente' title='Editar'><i class='fas fa-edit'></i></button>
                                                  </td>
                                              </tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
</body>
</html>