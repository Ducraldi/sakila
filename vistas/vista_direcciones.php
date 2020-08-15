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
                <div class=" ani animated animate__bounceInLeft  col-md-5">
                    <form action="direcciones.php" method="post">
                        <div class="mb-3">
                            <label for="direccionPrincipal">Tu Direccion Principal </label>
                            <input value="<?= $direccionPrincipal ?>" type="text" name="direccionPrincipal"
                                   id="direccionPrincipal" placeholder="Escribe tu direccion principal"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="direccionSecundaria">tu Direccion Secundaria </label>
                            <input value="<?= $direccionSecundaria ?>" type="text" name="direccionSecundaria"
                                   id="direccionSecundaria" placeholder="Escribe tu direccion secundaria"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="distrito">Tu Distrito </label>
                            <input value="<?= $distrito ?>" placeholder="Escribe tu distrito" type="text"
                                   name="distrito" id="distrito"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="ciudad">Tu Ciudad </label>
                            <select name="ciudad" id="ciudad" class="custom-select">
                                <option value="<?= $ciudad ?>">Seleccione una Ciudad</option>
                                <?php
                                foreach ($ciudades as $ciudad) {
                                    echo "<option value=\"{$ciudad["city_id"]}\">{$ciudad["city"]}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="codigoPostal">Tu codigo Postal </label>
                            <input value="<?= $codigoPostal ?>" placeholder="Escribe tu codigo postal" type="text"
                                   name="codigoPostal" id="codigoPostal"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="telefono">Tu Nunmero de Telefono </label>
                            <input value="<?= $telefono ?>" type="text" placeholder="Escribe tu telefono"
                                   name="telefono" id="telefono"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="guardar_direccion"></label>
                            <button type="submit" name="guardar_direccion" id="guardar_direccion"
                                    class="btn btn-primary"><i class="fas fa-save"> Enviar</i></button>
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
                    <hr>
                </div>
            </div
        </div>
        <?php
        if (empty($todasDirecciones)) {
            include_once "partes/parte_empty.php";
        } else { ?>
        <div class="row">
            <div class="colorTabla col-md-12">
                <form action="" method="post">
                    <table class="table table-sm table-dark">
                        <thead>
                        <tr class=>
                            <th scope="col">ID</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Direccion Numero 2</th>
                            <th scope="col">Distrito</th>
                            <th scope="col">Id City</th>
                            <th scope="col">Codigo Postal</th>
                            <th scope="col">Telefono</th>
                            <th>Acciones</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        foreach ($todasDirecciones as $direcciones) {

                            echo "<tr class=\"bg-secondary\">
                                              <th scope=\"row\">{$direcciones['address_id']}</th>      
                                              <td>{$direcciones['address']}</td>
                                              <td>{$direcciones['address2']}</td>
                                              <td>" . ucwords(strtolower($direcciones['district'])) . "</td>
                                              <td>{$direcciones['city_id']}</td>
                                              <td>{$direcciones['postal_code']}</td>
                                              <td>{$direcciones['phone']}</td>
                                              <td>
                                  <button class='btn btn-outline-danger btn-sm' value='{$direcciones['address_id']}' name='eliminarDireccion' title='Eliminar'><i class='fas fa-trash'></i></button>
                                  <button class='btn btn-outline-success btn-sm' value='{$direcciones['address_id']}' name='edictarDireccion' title='Editar'><i class='fas fa-edit'></i></button>
                                  </td>                
                                          </tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </form>
            </div>
            <?php } ?>
</div>
</body>
</html>