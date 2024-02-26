<?php
        
    require '../../includes/config/database.php';
    require '../../includes/funciones.php';

    $db = conectarDB();
    $db->set_charset('utf8');

    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

    

        $titulo = $_REQUEST['titulo'];
        $precio = $_REQUEST['precio'];
        $descripcion = $_REQUEST['descripcion'];
        $habitaciones = $_REQUEST['habitaciones'];
        $wc = $_REQUEST['wc'];
        $estacionamiento = $_REQUEST['estacionamiento'];
        $vendedor = $_REQUEST['vendedor'];

        cTexto($titulo,'titulo',$errores);
        cNum($precio,'precio',$errores,TRUE,10000000000);
        cTexto($descripcion,'descripcion',$errores);
        cNum($habitaciones,'habitaciones',$errores,TRUE,20);
        cNum($wc,'wc',$errores,TRUE,20);
        cNum($estacionamiento,'estacionamiento',$errores,TRUE,20);
        cNum($vendedor,'vendedor',$errores,TRUE,20);

        if(empty($errores)) {
            $query = " INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedores_id ) VALUES ( '$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$vendedor' ) ";

            $resultado = mysqli_query($db,$query);
            $error = mysqli_error($db);
        }
    }


    incluirTemplate('header');
?>

    <main class="contenedor seccion">

        <h1>Crear</h1>

        <a href="/frostinmo/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach ?>

        <form action="/frostinmo/admin/propiedades/crear.php" method="POST" class="formulario">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" placeholder="Propiedad" value=<?= $titulo ? $titulo : "" ?>>

                <label for="precio">Precio:</label>
                <input type="text" name="precio" id="precio" placeholder="Precio Propiedad" value=<?= $precio ? $precio : "" ?>>

                <label for="imagen">Imágen:</label>
                <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png" placeholder="Imágen Propiedad">

                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion"><?= $descripcion ? $descripcion : "" ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información de la Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej: 3" min="1" max="9" value=<?= $habitaciones ? $habitaciones : "" ?>>

                <label for="wc">Baños:</label>
                <input type="number" name="wc" id="wc" placeholder="Ej: 3" min="1" max="9" value=<?= $wc ? $wc : "" ?>>

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej: 3" min="1" max="9" value=<?= $estacionamiento ? $estacionamiento : "" ?>>
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
