<?php include_once "partes/parte_head.php" ?>
<body class="inci">
<?php include_once "partes/parte_menu_principal.php" ?>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <?php include_once "partes/parte_menu.php"; ?>

        </div>
        <div class="col-md-5">
            <h3><?php echo "$nombrePagina"; ?></h3>
            <div class="row">
                <div class="col-md-12">
                    <form class="lolo" action="pelicula.php" method="post">
                        <div class="mb-3">
                            <label for="tituloPelicula">Titulo de la Pelicula </label>
                            <input type="text" name="tituloPelicula" id="tituloPelicula" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="descripcionPelicula">Descripcion de la Pelicula</label>
                            <input type="text" name="descripcionPelicula" id="descripcionPelicula" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="lanzamientoPelicula">Lanzamiento de la Pelicula</label>
                            <input type="text" name="lanzamientoPelicula" id="lanzamientoPelicula" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="lenguajePelicula">Lenguaje de la Pelicula</label>
                            <select name="lenguajePelicula" id="lenguajePelicula" class="custom-select">
                                <option value="">Aqui va el Lenguaje de la Pelicula dede SQL</option>

                                <?php

                                foreach ($lenguajesPeliculas as $lenguaje) {
                                    echo "<option value=\"{$lenguaje["lenguage_id"]}\" >{$lenguaje["name"]}</option>";

                                }

                                ?>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="precioPelicula">Precio de la pelicula</label>
                            <input type="text" name="precioPelicula" id="precioPelicula" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="codigoPostal">Tu codigo Postal </label>
                            <input type="text" name="codigoPostal" id="codigoPostal" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="specialPelicula">Especiales de Peliculas </label>
                            <input type="text" name="specialPelicula" id="specialPelicula" class="form-control">
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="guardar_pelicula" class="btn btn-primary">Enviar Datos</button>
                        </div>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>