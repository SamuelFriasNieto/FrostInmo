<?php
  require '../../includes/funciones.php';
  incluirTemplate('header');
?>

    <main class="contenedor seccion">

        <h1>Crear</h1>

        <a href="/frostinmo/admin" class="boton boton-verde">Volver</a>

        <form action="" class="formulario">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Título:</label>
                <input type="text" name="" id="titulo" placeholder="Propiedad">

                <label for="precio">Precio:</label>
                <input type="text" name="" id="precio" placeholder="Precio Propiedad">

                <label for="imagen">Imágen:</label>
                <input type="file" name="" id="imagen" accept="image/jpeg, image/png" placeholder="Imágen Propiedad">

                <label for="descripcion">Descripción:</label>
                <textarea name="" id="descripcion"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información de la Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" name="" id="habitaciones" placeholder="Ej: 3" min="1" max="9" >

                <label for="wc">Baños:</label>
                <input type="number" name="" id="wc" placeholder="Ej: 3" min="1" max="9" >

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" name="" id="estacionamiento" placeholder="Ej: 3" min="1" max="9" >
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="" id="">
                    <option value="1">Samuel</option>
                    <option value="2">Helena</option>
                </select>
            </fieldset>

            <input type="submit" name="" id="" value="Crear Propiedad" class="boton boton-verde">

        </form>

    </main>

    <?php
  incluirTemplate('footer');
?>
