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
                    <form action="categoria.php" method="post">
                        <input type="hidden" name="idCategoria" value="<?= $idCategoria ?>">
                        <div class="mb-3">
                            <label for="nombreCategoria">Nombre de las Categoria</label>
                            <input type="text" placeholder="Escribe una categoria" name="nombreCategoria"
                                   value="<?= $nombreCategoria ?>" id="nombreCategoria" class="form-control">
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="guardar_categoria" class="btn btn-primary"><i
                                        class="fas fa-save"> Enviar</i></button>
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
            if (empty($categorias)) {
                include_once "partes/parte_empty.php";
            } else { ?>
                <div class="row">
                    <div class="colorTabla col-md-12">
                        <form action="" method="post">
                            <table class="table table-sm table-dark">
                                <thead>
                                <tr class=>
                                    <th scope="col">ID</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                foreach ($categorias as $categoria) {

                                    echo "<tr class=\"bg-secondary\">
                                                  <th scope=\"row\">{$categoria['category_id']}</th>      
                                                  <td>" . ucwords(strtolower($categoria['name'])) . "</td>  
                                                  <td>{$categoria['fecha']}</td>
                                                  <td>
                                                  <button class='btn btn-outline-danger btn-sm' value='{$categoria['category_id']}' name='eliminarCategoria' title='Eliminar'><i class='fas fa-trash'></i></button>
                                                  <button class='btn btn-outline-success btn-sm' value='{$categoria['category_id']}' name='editarCategoria' title='Editar'><i class='fas fa-edit'></i></button>
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
</body>
</html>