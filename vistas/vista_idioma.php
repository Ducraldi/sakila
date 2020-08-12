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
                <div class="col-md-10">
                    <form action="idioma.php" method="post">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="nombreIdioma">Buscar por el idioma</label>
                                <input type="text" name="nombreIdioma" id="nombreIdioma" value="<?= $nombreIdioma ?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary" name="guardar_idioma"><i class="fas fa-save"> Enviar</i>
                                </button>
                            </div>
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
            if (empty($lenguajes)) {
                include_once "partes/parte_empty.php";
            } else { ?>
                <div class="row">
                    <div class="colorTabla col-md-12">
                        <form action="" method="post">
                            <table class="table table-sm table-dark">
                                <thead>
                                <tr class=>
                                    <th scope="col">ID</th>
                                    <th scope="col">Idioma</th>
                                    <th scope="col">Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                foreach ($lenguajes as $lenguaje) {

                                    echo "<tr class=\"bg-secondary\">
                                                  <th scope=\"row\">{$lenguaje['language_id']}</th>
                                                  <td>" . ucwords(strtolower($lenguaje['name'])) . "  </td>  
                                                  <td>{$lenguaje['fecha']}</td>
                                                  <td>
                                                  <button class='btn btn-outline-danger btn-sm' value='' name='eliminarIdioma' title='Eliminar'><i class='fas fa-trash'></i></button>
                                                  <button class='btn btn-outline-success btn-sm' value='' name='edictarIdioma' title='Editar'><i class='fas fa-edit'></i></button>
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