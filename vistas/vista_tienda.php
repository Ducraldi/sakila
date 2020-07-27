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
                    <form action="tienda.php" method="post">
                        <div class="mb-3">
                            <label for="gerenteTienda">Gerente de la tienda</label>
                            <select name="gerenteTienda" id="gerenteTienda" class="custom-select">
                                <option value="">Aqui va la Gerente de la tienda desde SQL</option>

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
                                <option value="">Aqui va la Direccion de la tienda desde SQL</option>

                                <?php

                                foreach ($direccionesTiendas as $direcciones) {

                                    echo "<option value=\"{$direcciones["store_id"]}\">{$direcciones["address_id"]}</option>";
                                }
                                ?>

                            </select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="guardar_tienda" class="btn btn-primary">Enviar Datos
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

            <div class="row">
                <div class="colorTabla col-md-12">
                    <table class="table table-sm table-dark">
                        <thead>
                        <tr class=>
                            <th scope="col">ID</th>
                            <th scope="col">Gerentes</th>
                            <th scope="col">direccion</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        foreach ($datosTienda as $tienda) {

                            echo "<tr class=\"bg-primary\">
                              <th scope=\"row\">{$tienda['store_id']}</th>
                              <td>{$tienda['first_name']}</td>
                              <td>{$tienda['address']}</td>
                          </tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>