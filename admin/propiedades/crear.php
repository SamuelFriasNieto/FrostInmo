<?php
        
    require '../../includes/config/database.php';

    $db = conectarDB();
    $db->set_charset('utf8');

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

    

        $titulo = $_REQUEST['titulo'];
        $precio = $_REQUEST['precio'];
        $descripcion = $_REQUEST['descripcion'];
        $habitaciones = $_REQUEST['habitaciones'];
        $wc = $_REQUEST['wc'];
        $estacionamiento = $_REQUEST['estacionamiento'];
        $vendedor = $_REQUEST['vendedor'];

        $query = " INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedores_id ) VALUES ( '$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$vendedor' ) ";

        $resultado = mysqli_query($db,$query);
        $error = mysqli_error($db);



        echo $query;
        echo $error;

        if($resultado) {
            echo 'insertado correctamente';
        } else {
            echo 'Ha pasado algo';
        }
    }

    require '../../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">

        <h1>Crear</h1>

        <a href="/frostinmo/admin" class="boton boton-verde">Volver</a>

        <form action="/frostinmo/admin/propiedades/crear.php" method="POST" class="formulario">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" placeholder="Propiedad">

                <label for="precio">Precio:</label>
                <input type="text" name="precio" id="precio" placeholder="Precio Propiedad">

                <label for="imagen">Imágen:</label>
                <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png" placeholder="Imágen Propiedad">

                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información de la Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej: 3" min="1" max="9" >

                <label for="wc">Baños:</label>
                <input type="number" name="wc" id="wc" placeholder="Ej: 3" min="1" max="9" >

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej: 3" min="1" max="9" >
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor" id="">
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
