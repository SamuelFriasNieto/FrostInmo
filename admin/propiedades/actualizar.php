<?php

require '../../includes/config/database.php';
require '../../includes/funciones.php';

$db = conectarDB();
$db->set_charset('utf8');

$idPropiedad = recoge('id');

if (!$idPropiedad) {
  header('location:/frostinmo/admin');
}

$consulta2 = "SELECT * FROM propiedades WHERE id = $idPropiedad";
$consulta = "SELECT * FROM vendedores";
$datos = mysqli_query($db, $consulta2);
$datosPropiedades = mysqli_fetch_assoc($datos);
$vendedoresDB = mysqli_query($db, $consulta);
var_dump($datosPropiedades);

$errores = [];
$vendedorId = $datosPropiedades['vendedores_id'];
$imagen = $datosPropiedades['imagen'];

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
    <fieldset>
      <legend>Información General</legend>

      <label for="titulo">Título:</label>
      <input type="text" name="titulo" id="titulo" placeholder="Propiedad" value='<?= isset($titulo) ? $titulo : $datosPropiedades['titulo'] ?>'>

      <label for="precio">Precio:</label>
      <input type="text" name="precio" id="precio" placeholder="Precio Propiedad" value=<?= isset($precio) ? $precio :  $datosPropiedades['precio'] ?>>

      <label for="imagen">Imágen:</label>
      <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png" placeholder="Imágen Propiedad">

      <img src="/frostinmo/imagenes/<?= $datosPropiedades['imagen'] ?>" class="imagen-small" alt="imagen propiedad">

      <label for="descripcion">Descripción:</label>
      <textarea name="descripcion" id="descripcion"><?= isset($descripcion) ? $descripcion :  $datosPropiedades['descripcion'] ?></textarea>
    </fieldset>

    <fieldset>
      <legend>Información de la Propiedad</legend>

      <label for="habitaciones">Habitaciones:</label>
      <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej: 3" min="1" max="9" value=<?= isset($habitaciones) ? $habitaciones :  $datosPropiedades['habitaciones'] ?>>

      <label for="wc">Baños:</label>
      <input type="number" name="wc" id="wc" placeholder="Ej: 3" min="1" max="9" value=<?= isset($wc) ? $wc :  $datosPropiedades['wc'] ?>>

      <label for="estacionamiento">Estacionamiento:</label>
      <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej: 3" min="1" max="9" value=<?= isset($estacionamiento) ? $estacionamiento :  $datosPropiedades['estacionamiento'] ?>>
    </fieldset>

    <fieldset>
      <legend>Vendedor</legend>

      <select name="vendedor" id="">
        <?php while ($vendedor = mysqli_fetch_assoc($vendedoresDB)) : ?>
          <option <?= $vendedorId === $vendedor['id'] ? 'selected' : "" ?> value='<?= $vendedor['id'] ?>'>
            <?= $vendedor['nombre'] . " " . $vendedor['apellidos'] ?>
          </option>
        <?php endwhile; ?>
      </select>
    </fieldset>

    <input type="submit" name="" id="" value="Actualizar Propiedad" class="boton boton-verde">

  </form>

</main>

<?php
incluirTemplate('footer');
?>