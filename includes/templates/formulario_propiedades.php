<fieldset>
                <legend>Información General</legend>

                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" placeholder="Propiedad" value='<?= s($propiedad->titulo) ?>'>

                <label for="precio">Precio:</label>
                <input type="text" name="precio" id="precio" placeholder="Precio Propiedad" value=<?= s($propiedad->precio) ?>>

                <label for="imagen">Imágen:</label>
                <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png" placeholder="Imágen Propiedad">

                <?php if($propiedad->imagen): ?>
                    <img class="imagen-small" src="../../imagenes/<?= $propiedad->imagen ?>" alt="foto propiedad">
                <?php endif ?>

                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion"><?= s($propiedad->descripcion) ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información de la Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej: 3" min="1" max="9" value=<?= s($propiedad->habitaciones) ?>>

                <label for="wc">Baños:</label>
                <input type="number" name="wc" id="wc" placeholder="Ej: 3" min="1" max="9" value=<?= s($propiedad->wc) ?>>

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej: 3" min="1" max="9" value=<?= s($propiedad->estacionamiento) ?>>
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor" id="">
                    <?php while($vendedor = mysqli_fetch_assoc($vendedoresDB)): ?>
                        <option <?= isset($vendedorId) && $vendedorId === $vendedor['id'] ? 'selected' : "" ?> value='<?= s($propiedad->vendedor) ?>'>
                            <?= $vendedor['nombre'] . " " . $vendedor['apellidos'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </fieldset>