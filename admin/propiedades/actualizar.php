<?php

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

require '../../includes/app.php';

autenticar();

$idPropiedad = recoge('id');

if (!$idPropiedad) {
  header('location:/frostinmo/admin');
}

$propiedad = Propiedad::find($idPropiedad);

$vendedores = Vendedor::all();

$errores = Propiedad::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $args = [];

  $args['titulo'] = $_POST['titulo'] ?? null;
  $args['precio'] = $_POST['precio'] ?? null;
  $args['descripcion'] = $_POST['descripcion'] ?? null;
  $args['habitaciones'] = $_POST['habitaciones'] ?? null;
  $args['wc'] = $_POST['wc'] ?? null;
  $args['estacionamiento'] = $_POST['estacionamiento'] ?? null;
  $args['vendedor'] = $_POST['vendedor'] ?? null;

  $propiedad->sincronizar($args);

  $nombreImagen = md5(uniqid(rand(),true)) . ".jpg";

  if($_FILES['imagen']['tmp_name']) {
      $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
      $propiedad->setImagen($nombreImagen);
  }

  $errores = $propiedad->validarDatos();

  if (empty($errores)) {

    $image->save(CARPETAS_IMAGENES . $nombreImagen);

    if ($propiedad->guardar()) {
      header('location:/frostinmo/admin?resultado=2');
    }
  }
}


incluirTemplate('header');
?>

<main class="contenedor seccion">

  <h1>Actualizar Propiedad</h1>

  <a href="/frostinmo/admin" class="boton boton-verde">Volver</a>

  <?php foreach ($errores as $error) : ?>
    <div class="alerta error">
      <?php echo $error; ?>
    </div>
  <?php endforeach ?>

  <form method="POST" class="formulario" enctype="multipart/form-data">
    
    <?php include '../../includes/templates/formulario_propiedades.php';  ?>

    <input type="submit" name="" id="" value="Actualizar Propiedad" class="boton boton-verde">

  </form>

</main>

<?php
incluirTemplate('footer');
?>