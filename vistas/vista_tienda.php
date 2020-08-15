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
                    <form action="tienda.php" method="post">
                        <div class="mb-3">
                            <label for="gerenteTienda">Personal de la tienda</label>
                            <select name="gerenteTienda" id="gerenteTienda" class="custom-select">
                                <option value="">Selecciones el Personal de la tienda</option>

                                <?php

                                foreach ($nombrePersonales as $personal) {

                                    echo "<option value=\"{$personal["staff_id"]}\">{$personal["first_name"]}</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="direccionTienda">Direccion de la Tienda</label>
                            <select name="direccionTienda" id="direccionTienda" class="custom-select">
                                <option value="">Seleccione Direccion de la tienda </option>

                                <?php

                                foreach ($todasDirecciones as $direcciones) {

                                    echo "<option value=\"{$direcciones["address_id"]}\">{$direcciones["address"]}</option>";
                                }
                                ?>

                            </select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="guardar_tienda" class="btn btn-primary"><i class="fas fa-save"> Enviar</i>
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
                </div>
            </div>
            <?php
            if (empty($datosTienda)) {
                include_once "partes/parte_empty.php";
            } else { ?>

                <div class="row">
                    <div class="colorTabla col-md-12">
                        <form action="" method="post">
                            <table class="table table-sm table-dark">
                                <thead>
                                <tr class=>
                                    <th scope="col">ID</th>
                                    <th scope="col">Personales</th>
                                    <th scope="col">Direccion</th>
                                    <th scope="col">Fechas</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                foreach ($datosTienda as $tienda) {

                                    echo "<tr class=\"bg-secondary\">
                                                  <th scope=\"row\">{$tienda['store_id']}</th>
                                                  <td>" . ucwords(strtolower($tienda['first_name'])) . "</td>
                                                  <td>{$tienda['address']}</td>
                                                  <td>{$tienda['fecha']}</td>
                                                  <td>
                                                      <button class='btn btn-outline-danger btn-sm' value='{$tienda['store_id']}' name='eliminarTienda' title='Eliminar'><i class='fas fa-trash'></i></button>
                                                      <button class='btn btn-outline-success btn-sm' value='{$tienda['store_id']}' name='edictarTienda' title='Editar'><i class='fas fa-edit'></i></button>  
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
    </div>
</div>
</div>
</body>
</html>