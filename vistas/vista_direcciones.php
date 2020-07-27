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
                    <form action="direcciones.php" method="post">
                        <div class="mb-3">
                            <label for="direccionPrincipal">Tu Direccion Principal </label>
                            <input value="<?= $direccionPrincipal ?>" type="text" name="direccionPrincipal"
                                   id="direccionPrincipal" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="direccionSecundaria">tu Direccion Secundaria </label>
                            <input value="<?= $direccionSecundaria ?>" type="text" name="direccionSecundaria"
                                   id="direccionSecundaria" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="distrito">Tu Distrito </label>
                            <input value="<?= $distrito ?>" type="text" name="distrito" id="distrito"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="ciudad">Tu Ciudad </label>
                            <select name="ciudad" id="ciudad" class="custom-select">
                                <option value="<?= $ciudad ?>">Aqui va el listado de la ciudad dede SQL</option>

                                <?php

                                foreach ($ciudades as $ciudad) {
                                    echo "<option value=\"{$ciudad["city_id"]}\">{$ciudad["city"]}</option>";

                                }

                                ?>


                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="codigoPostal">Tu codigo Postal </label>
                            <input value="<?= $codigoPostal ?>" type="text" name="codigoPostal" id="codigoPostal"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="telefono">Tu Nunmero de Telefono </label>
                            <input value="<?= $telefono ?>" type="text" name="telefono" id="telefono"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="localisacion">Tu Localisacion </label>
                            <input value="<?= $localisacion ?>" type="text" name="localisacion" id="localisacion"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="guardar_direccion"></label>
                            <button type="submit" name="guardar_direccion" id="guardar_direccion"
                                    class="btn btn-primary">Enviar
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
        </div>
    </div>
</div>
<div class="row">
    <div class="colorTabla col-md-12">
        <table class="table table-sm table-dark">
            <thead>
            <tr class=>
                <th scope="col">ID</th>
                <th scope="col">Direccion</th>
                <th scope="col">Direccion Numero 2</th>
                <th scope="col">Distrito</th>
                <th scope="col">IDCity</th>
                <th scope="col">Codigo Postal</th>
                <th scope="col">Telefono</th>
                <th scope="col">Localisacion</th>
            </tr>
            </thead>
            <tbody>

            <?php

            foreach ($todasDirecciones as $direcciones) {

                echo "<tr class=\"bg-primary\">
                              <th scope=\"row\">{$direcciones['address_id']}</th>      
                              <td>{$direcciones['address']}</td>
                              <td>{$direcciones['address2']}</td>
                              <td>{$direcciones['district']}</td>
                              <td>{$direcciones['city_id']}</td>
                              <td>{$direcciones['postal_code']}</td>
                              <td>{$direcciones['phone']}</td>    
                              <td>{$direcciones['location']}</td>                       
                          </tr>";
            }
            ?>
            </tbody>
        </table>
</body>
</html>