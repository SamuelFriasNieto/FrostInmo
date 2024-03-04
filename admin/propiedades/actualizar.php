<?php

use App\Propiedad;

require '../../includes/app.php';

autenticar();

$idPropiedad = recoge('id');

if (!$idPropiedad) {
  header('location:/frostinmo/admin');
}

$propiedad = Propiedad::find($idPropiedad);

$consulta = "SELECT * FROM vendedores";
$vendedoresDB = mysqli_query($db, $consulta);

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Sanitización alternativa -> mysqli_real_escape_string($db,$_POST)


  $titulo = recoge('titulo');
  $precio = recoge('precio');
  $descripcion = recoge('descripcion');
  $habitaciones = recoge('habitaciones');
  $wc = recoge('wc');
  $estacionamiento = recoge('estacionamiento');
  $vendedorId = recoge('vendedor');
  $creado = date('Y-m-d');

  $imagen = $_FILES['imagen'];

  cTexto($titulo, 'titulo', $errores);
  cNum($precio, 'precio', $errores, TRUE, 10000000000);
  cImagen($imagen, 'imagen', $errores, 1000 * 100, FALSE);
  cTexto($descripcion, 'descripcion', $errores);
  cNum($habitaciones, 'habitaciones', $errores, TRUE, 20);
  cNum($wc, 'wc', $errores, TRUE, 20);
  cNum($estacionamiento, 'estacionamiento', $errores, TRUE, 20);
  cNum($vendedorId, 'vendedor', $errores, TRUE, 20);



  if (empty($errores)) {
    
    $carpetaImagenes = '../../imagenes/';

    if (!is_dir($carpetaImagenes)) {
      mkdir($carpetaImagenes);
    }

    if ($imagen['name']) {
      unlink($carpetaImagenes . $datosPropiedades['imagen']);
      $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    } else {
      $nombreImagen = $datosPropiedades['imagen'];
    }



    move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

    $query = " UPDATE propiedades SET 
            titulo = '$titulo',
            precio = '$precio',
            imagen = '$nombreImagen',
            descripcion = '$descripcion',
            wc = '$wc',
            estacionamiento = '$estacionamiento',
            vendedores_id = '$vendedorId'
            WHERE id = '$idPropiedad' ";

    $resultado = mysqli_query($db, $query);
    $error = mysqli_error($db);

    if ($resultado) {
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