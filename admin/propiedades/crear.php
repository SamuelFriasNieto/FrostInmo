<?php
        
    require '../../includes/app.php';

    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Image;

    autenticar();
    
    $db = conectarDB();
    $db->set_charset('utf8');

    $consulta = "SELECT * FROM vendedores";
    $vendedoresDB = mysqli_query($db,$consulta);

    $errores = Propiedad::getErrores();

    $propiedad = new Propiedad();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $propiedad = new Propiedad($_POST);

        $nombreImagen = md5(uniqid(rand(),true)) . ".jpg";

        if($_FILES['imagen']['tmp_name']) {
            $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
            $propiedad->setImagen($nombreImagen);
        }

        $errores = $propiedad->validarDatos();
        

        if(empty($errores)) {

            if(!is_dir(CARPETAS_IMAGENES)) {
                mkdir(CARPETAS_IMAGENES);
            }

            $image->save(CARPETAS_IMAGENES . $nombreImagen);

            if($propiedad->guardar()) {
                header('location:/frostinmo/admin?resultado=1');
            }
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

        <form action="/frostinmo/admin/propiedades/crear.php" method="POST" class="formulario" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_propiedades.php' ?>

            <input type="submit" name="" id="" value="Crear Propiedad" class="boton boton-verde">

        </form>

    </main>

    <?php
  incluirTemplate('footer');
?>
