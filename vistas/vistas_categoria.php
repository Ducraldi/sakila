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
                    <form action="categoria.php" method="post">
                        <div class="mb-3">
                            <label for="nombreCategoria">Nombre de las Categoria</label>
                            <input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control">
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="guardar_categoria" class="btn btn-primary">Enviar Datos</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>