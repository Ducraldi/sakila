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
                    <form action="personal.php" method="post">
                        <div class="mb-3">
                            <label for="nombrePersonal">Nombre del Personal </label>
                            <input value="<?= $nombrePersonal ?>" type="text" name="nombrePersonal" id="nombrePersonal"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="apellidoPersonal">Apellido del Personal</label>
                            <input value="<?= $apellidoPersonal ?>" type="text" name="apellidoPersonal"
                                   id="apellidoPersonal" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="direccionPersonal">Direccion del Personal</label>
                            <select name="direccionPersonal" id="direccionPersonal" class="custom-select">
                                <option value="$direccionPersonal">Aqui va la Direccion del Personal desde SQL</option>
                                <?php

                                foreach ($personales as $direcciones) {

                                    echo "<option value=\"{$direcciones["store_id"]}\">{$direcciones["address_id"]}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="imagenPersonal">Imagenes del Personal</label>
                            <input value="<?= $imagenPersonal ?>" type="text" name="imagenPersonal" id="imagenPersonal"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="emailPersonal">Escribe el correo del Personal</label>
                            <div class="input-group mb-3">
                                <input value="<?= $emailPersonal ?>" type="text" name="emailPersonal" id="emailPersonal"
                                       class="form-control"
                                       placeholder="Escribe tu nombre" aria-label="Recipient's username"
                                       aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="emailPersonal">@gmail.com</span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="tiendaPersonal">Tiendas del Personal</label>
                                <select name="tiendaPersonal" id="tiendaPersonal" class="custom-select">
                                    <option value="tiendaPersonal">Aqui va la Tienda del Personal desde SQL</option>
                                    <?php

                                    foreach ($personales as $tiendas) {
                                        echo "<option value=\"{$tiendas["store_id"]}\">{$tiendas["store_id"]}</option>";
                                    }

                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="usuarioPersonal">Usuario del Personal</label>
                                <input value="<?= $usuarioPersonal ?>" type="text" name="usuarioPersonal"
                                       id="usuarioPersonal" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="contrasenaPersonal" class="sr-only">Contraseña del Personal</label>
                                <input value="<?= $contrasenaPersonal ?>" placeholder="Contraceña" type="password" name="contrasenaPersonal"
                                       id="contrasenaPersonal" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="guardar_personal" class="btn btn-primary">Enviar Datos
                                </button>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="colorTabla col-md-12">
        <table class="table table-sm table-dark">
            <thead>
            <tr class=>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Direccion</th>
                <th scope="col">Imagen</th>
                <th scope="col">Email</th>
                <th scope="col">Tienda</th>
                <th scope="col">Usuario</th>
                <th scope="col">Contraceña</th>
            </tr>
            </thead>
            <tbody>

            <?php

            foreach ($personales as $personal) {

                echo "<tr class=\"bg-primary\">
                              <th scope=\"row\">{$personal['staff_id']}</th>
                              <td>{$personal['first_name']}</td>
                              <td>{$personal['last_name']}</td>
                              <td>{$personal['address_id']}</td>
                              <td>{$personal['picture']}</td>
                              <td>{$personal['email']}</td>
                              <td>{$personal['store_id']}</td>
                              <td>{$personal['username']}</td>
                              <td>{$personal['password']}</td>
                          </tr>";
            }
            ?>
            </tbody>
        </table>
</body>
</html>