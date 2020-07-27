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
                    <form action="ciudad.php" method="post">
                        <div class="mb-3">
                            <label for="ciudadPrincipal">Ciudad</label>
                            <input type="text" name="ciudadPrincipal" id="ciudadPrincipal" class="form-control"
                                   value="<?= $ciudadPrincipal ?>">
                        </div>

                        <div class="mb-3">
                            <label for="selecionPais">Seleccione tu pais</label>
                            <select name="selecionPais" id="selecionPais" class="custom-select">
                                <option value="">Aqui va el listado de la pais dede SQL</option>
                                <?php
                                foreach ($paises as $pais) {
                                    echo " <option value=\"{$pais["country_id"]}\">{$pais["country"]}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="guardar_ciudad" class="btn btn-primary">Enviar Datos</button>
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
                            <th scope="col">Ciudades</th>
                            <th scope="col">Paises</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        foreach ($ciudades as $ciudad) {

                            echo "<tr class=\"bg-primary\">
                              <th scope=\"row\">{$ciudad['city_id']}</th>
                              <td>{$ciudad['city']}</td>
                              <td>{$ciudad['country']}</td>
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