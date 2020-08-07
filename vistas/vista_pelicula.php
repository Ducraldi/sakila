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
                            <input type="text" placeholder="Digite la Pelicula" value="<?= $tituloPelicula ?>" name="tituloPelicula" id="tituloPelicula" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label  for="descripcionPelicula">Descripcion de la Pelicula</label>
                            <input type="text" placeholder="Digite la Descripcion de la Pelicula" value="<?= $descripcionPelicula ?>" name="descripcionPelicula"  id="descripcionPelicula" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="lanzamientoPelicula" class="form-label">Año de lanzamiento ... </label>
                            <input type="text" list="listadoAnos" placeholder="Digite e año de lanzamiento " value="<?= $lanzamientoPelicula ?>"  name="lanzamientoPelicula" id="lanzamientoPelicula" class="form-control">
                            <datalist id="listadoAnos">
                                <?php

                                for ($year = date("Y"); $year >= 1900; $year--){
                                    echo "<option value=\"{$year}\">";
                                }

                                ?>
                            </datalist>
                        </div>

                        <div class="mb-3">
                            <label for="lenguajePelicula">Lenguaje de la Pelicula</label>
                            <select name="lenguajePelicula" value="<?= $lenguajePelicula ?> id="lenguajePelicula" class="custom-select">
                                <option value="">Lenguajes de la Peliculas</option>

                                <?php

                                foreach ($lenguajesPeliculas as $lenguaje) {
                                    echo "<option value=\"{$lenguaje["lenguage_id"]}\" >{$lenguaje["name"]}</option>";

                                }

                                ?>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="precioPelicula">Precio de la pelicula</label>
                            <input type="text" name="precioPelicula" value="<?= $precioPelicula ?>" placeholder="Digite el Precio de la pelicula" id="precioPelicula" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="remplazoPelicula">Remplazo</label>
                            <input type="text" name="remplazoPelicula" value="<?= $remplazoPelicula ?>"  placeholder="Digite el Remplazo de la pelicula" id="remplazoPelicula" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="clasificacionlPelicula" class="form-label">Clasificacion de la Pelicula</label>
                            <select name="clasificacionlPelicula" value="<?= $clasificacionlPelicula ?>" placeholder="Digite la Clasificacion de la Pelicula"clasificacionlPelicula" class="custom-select">
                                <option value="">clasificacionlPeliculade la Pelicula </option>
                                <?php
                                $clasificaciones = ['G', 'PG', 'PG-13', 'R','NC-17'];
                                foreach ($clasificaciones as $reting){
                                    echo "<option value=\"{$reting}\">{$reting}</option>";

                                }
                                ?>
                            </select>

                        </div>


                        <div class="mb-3">
                            <label for="especialPelicula">Especiales de Peliculas </label>
                            <select name="especialPelicula[]" id="especialPelicula" class="custom-select" multiple>
                                <option value="">Elige una o mas Caracteristica  </option>
                                <?php
                                $caracteristicas = ['Trailers', 'Commentaries', 'Deleted Scenes', 'Behind the Scenes'];
                                foreach ($caracteristicas as $caracteristica){
                                    echo "<option value=\"{$caracteristica}\">{$caracteristica}</option>";

                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="guardar_pelicula" class="btn btn-primary"><i class="fas fa-save"> Enviar</i></button>
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
    <hr>
    <?php
    if (empty($peliculas)) {
        include_once "partes/parte_empty.php";
    } else { ?>
    <div class="row">
        <div class="colorTabla col-md-12">
            <table class="table table-sm table-dark">
                <thead>
                <tr class=>
                    <th scope="col">Id</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">lanzamiento</th>
                    <th scope="col">Alquiler</th>
                    <th scope="col">Arrendamiento</th>
                    <th scope="col">longitud</th>
                    <th scope="col">Remplazo</th>
                    <th scope="col">Clasificación</th>
                    <th scope="col">Especiales</th>
                    <th scope="col">Fecha</th>
                </tr>
                </thead>
                <tbody>

                <?php

                foreach ($peliculas as $pelicula) {

                    echo "<tr class=\"bg-secondary\">
                              <th scope=\"row\">{$pelicula['film_id']}</th>      
                              <td>". ucwords(strtolower($pelicula['title']))."</td>
                              <td>{$pelicula['description']}</td>  
                              <td>{$pelicula['release_year']}</td> 
                              <td>{$pelicula['rental_duration']}</td> 
                              <td>{$pelicula['rental_rate']}</td> 
                              <td>{$pelicula['length']}</td> 
                              <td>{$pelicula['replacement_cost']}</td> 
                              <td>{$pelicula['rating']}</td> 
                              <td>{$pelicula['special_features']}</td>
                              <td>{$pelicula['fecha']}</td>      
                          </tr>";
                }
                ?>
                </tbody>
            </table>
</div>
        <?php } ?>
</body>
</html>