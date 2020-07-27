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
                <div class="col-md-12">
                    <form action="actor.php" method="post">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="nombreActor">Primer nombre del autor</label>
                                <input type="text" name="nombreActor" id="nombreActor" class="form-control"
                                       value="<?= $nombreActor ?>">
                            </div>


                            <div class="mb-3">
                                <label for="apellidoActor">Apellido del Actor</label>
                                <input type="text" name="apellidoActor" id="apellidoActor" class="form-control"
                                       value="<?= $apellidoActor ?>">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary" name="guardar_actor">Guardar</button>
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
            <div class="row">
                <div class="colorTabla col-md-12">
                    <table class="table table-sm table-dark">
                        <thead>
                        <tr class=>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        foreach ($actores as $actor) {

                            echo "<tr class=\"bg-primary\">
                              <th scope=\"row\">{$actor['actor_id']}</th>
                              <td>{$actor['first_name']}</td>
                              <td>{$actor['last_name']}</td>
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
</body>
</html>
<?php include_once "static/script/script.html" ?>
