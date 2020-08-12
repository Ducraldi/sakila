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
            <hr>
            <div class="row">
                <div class="col-md-5">
                    <form action="ciudad.php" method="post">
                        <div class="mb-3">
                            <label for="ciudadPrincipal">Ciudad</label>
                            <input type="text" name="ciudadPrincipal" id="ciudadPrincipal" class="form-control"
                                   value="<?= $ciudadPrincipal ?>">
                        </div>

                        <div class="mb-3">
                            <label for="selecionPais">Seleccione tu pais</label>
                            <?php if (empty($paises)) {?>
                            <div class="form-label"><i class="fas fa-info-circle"></i> No hay paises registrados</div>
                            <?php } else { ?>
                            <select name="selecionPais" id="selecionPais" class="custom-select">
                                <option value="">Aqui va el listado de la pais dede SQL</option>
                                <?php
                                foreach ($paises as $pais) {
                                    echo " <option value=\"{$pais["country_id"]}\">{$pais["country"]}</option>";
                                }
                                ?>
                            </select>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="guardar_ciudad" class="btn btn-primary"><i class="fas fa-save"> Enviar</i></button>
                        </div>
                    </form>
                    <hr>
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
            if (empty($ciudades)) {
                include_once "partes/parte_empty.php";
            } else { ?>

                <div class="row">
                    <div class="colorTabla col-md-12">
                        <form action="">
                            <table class="table table-sm table-dark">
                                <thead>
                                <tr class=>
                                    <th scope="col">ID</th>
                                    <th scope="col">Ciudades</th>
                                    <th scope="col">Paises</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                foreach ($ciudades as $ciudad) {

                                    echo "<tr class=\"bg-secondary\">
                                                  <th scope=\"row\">{$ciudad['city_id']}</th>
                                                  <td>{$ciudad['city']}</td>
                                                  <td>{$ciudad['country']}</td>
                                                  <td>
                                                  <button class='btn btn-outline-danger btn-sm' value='' name='eliminarCiudad' title='Eliminar'><i class='fas fa-trash'></i></button>
                                                  <button class='btn btn-outline-success btn-sm' value='' name='edictarCiudad' title='Editar'><i class='fas fa-edit'></i></button>
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