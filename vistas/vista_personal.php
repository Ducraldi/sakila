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
                <div class="ani animated animate__bounceInLeft col-md-5">
                    <form class="lolo" action="personal.php" method="post">
                        <div class="mb-3">
                            <label for="nombrePersonal">Nombre del Personal </label>
                            <input value="<?= $nombrePersonal ?>" placeholder="Escribe tu nombre" type="text"
                                   name="nombrePersonal" id="nombrePersonal"
                                   class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="apellidoPersonal">Apellido del Personal</label>
                            <input value="<?= $apellidoPersonal ?>" placeholder="Escribe tu apellido" type="text"
                                   name="apellidoPersonal"
                                   id="apellidoPersonal" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="direccionPersonal">Direccion del Personal</label>
                            <select name="direccionPersonal" id="direccionPersonal" class="custom-select">
                                <option value="$direccionPersonal">Selecciones Direccion del Personal</option>
                                <?php

                                foreach ($todaDirecciones as $direcciones) {

                                    echo "<option value=\"{$direcciones["address_id"]}\">{$direcciones["address"]}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="imagenPersonal">Pintura del Personal</label>
                            <input value="<?= $imagenPersonal ?>" type="text" name="imagenPersonal" id="imagenPersonal"
                                   class="form-control" placeholder="Escribe el nombre de la pintura">
                        </div>
                        <div class="mb-3">
                            <label for="emailPersonal">Escribe el correo del Personal</label>
                            <div class="input-group mb-3">
                                <input value="<?= $emailPersonal ?>" type="text" name="emailPersonal" id="emailPersonal"
                                       class="form-control"
                                       placeholder="Escribe tu correo electronico" aria-label="Recipient's username"
                                       aria-describedby="basic-addon2">
                            </div>

                        <div class="mb-3">
                            <label for="tiendaPersonal">Tiendas del Personal</label>
                            <select name="tiendaPersonal" id="tiendaPersonal" value="$tiendaPersonal" class="custom-select">
                                <option value="tiendaPersonal">Selecciones la tienda del Personal</option>
                                <?php

                                foreach ($personales as $tiendas) {
                                    echo "<option value=\"{$tiendas["staff_id"]}\">{$tiendas["name"]}</option>";
                                }

                                ?>
                            </select>
                        </div>

                            <div class="mb-3">
                                <input type="checkbox" id="activadorPersonal" name="activadorPersonal"
                                       value="activadorPersonal[]">
                                <label for="activadorPersonal">Activo</label><br>
                            </div>

                            <div class="mb-3">
                                <label for="usuarioPersonal">Usuario del Personal</label>
                                <input value="<?= $usuarioPersonal ?>" placeholder="Escribe el usuario" type="text" name="usuarioPersonal"
                                   id="usuarioPersonal" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="contrasenaPersonal" class="sr-only">Contraseña del Personal</label>
                            <input value="<?= $contrasenaPersonal ?>" placeholder="Escribe la contraceña" type="password" name="contrasenaPersonal"
                                   id="contrasenaPersonal" class="form-control">
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="guardar_personal" class="btn btn-primary"><i class="fas fa-save"> Enviar</i>
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
      
        <?php
        // para estar de abajo del rgistro
        if (empty($personales)) {
            include_once "partes/parte_empty.php";
        } else { ?>
        <div class="row">
            <div class="colorTabla col-md-12">
                <form action="" method="post">
                    <table class="table table-sm table-dark">
                </form>
                <thead>
                <tr class=>
                    <th scope="col">ID</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Direcciones</th>
                    <th scope="col">Pinturas</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tiendas</th>
                    <th scope="col">Activos</th>
                    <th scope="col">Usuarios</th>
                    <th scope="col">Contraceñas</th>
                    <th scope="col">Fechas</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php

                        foreach ($personales as $personal) {
                            if ($personal['active'] == '1') {
                                $icono = '<i class=\'fas fa-check text-success\'></i> ';
                            } else {
                                $icono = '<i class=\'fas fa-times text-danger\'></i>  ';
                            }
                               echo "<tr class=\"bg-secondary\">
                              <th scope=\"row\">{$personal['staff_id']}</th>
                              <td>" . ucwords(strtolower($personal['name'])) . "</td>
                              <td>{$personal['address']}</td>
                              <td>" . ucwords(strtolower($personal['picture'])) . "</td>
                              <td>{$personal['email']}</td>
                              <td>{$personal['first_name']}</td>
                              <td>{$personal['activo']} {$icono}</td>
                              <td>{$personal['username']}</td>
                              <td>{$personal['password']}</td>
                              <td>{$personal['fecha']}</td>
                              <td>
                                  <button class='btn btn-outline-danger btn-sm' value='{$personal['staff_id']}' name='eliminarPersonal' title='Eliminar'><i class='fas fa-trash'></i></button>
                                  <button class='btn btn-outline-success btn-sm' value='{$personal['staff_id']}' name='edictarPersonal' title='Editar'><i class='fas fa-edit'></i></button>
                                  </td>
                          </tr>";
                    }
                    ?>
                    </tbody>
                </table>
                <?php } ?>
    </div>
</div>

</body>
</html>