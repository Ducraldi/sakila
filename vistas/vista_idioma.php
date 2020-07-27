<?php include_once "partes/parte_head.php" ?>

<body class="inci">
<<?php include_once "partes/parte_menu_principal.php" ?>
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
                    <form action="idioma.php" method="post">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="nombreIdioma">Buscar por el idioma</label>
                                <input type="text" name="nombreIdioma" id="nombreIdioma" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary" name="guardar_idioma">Buscar Datos
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>