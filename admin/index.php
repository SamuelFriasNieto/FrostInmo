<?php
  require '../includes/funciones.php';
  autenticar();

  require '../includes/config/database.php';



  $db = conectarDB();

  $query = "SELECT * FROM propiedades";

  $propiedades = mysqli_query($db,$query);


  incluirTemplate('header');

  if(isset($_REQUEST['eliminar'])) {
    $id = recoge('id');

    if($id) {
      $query = "SELECT imagen FROM propiedades WHERE id = '$id'";
      $resultado = mysqli_query($db,$query);
      $resultado = mysqli_fetch_assoc($resultado);

      $carpetaImagenes = '../imagenes/';
      
      unlink($carpetaImagenes . $resultado['imagen']);
      
      $query = "DELETE FROM propiedades WHERE id = '$id'";

      $result = mysqli_query($db,$query);

      if($result) {
        header('location:/frostinmo/admin?resultado=3');
      }
    }
    
  }

  $resultado = recoge('resultado') ?? null;
?>

    <main class="contenedor seccion">
        <h1>Administrador de FrostInmo</h1>
        <?php  if($resultado === '1'): ?>
          <p class="alerta exito">Anuncio creado correctamente</p>
        <?php elseif($resultado === '2'): ?>
          <p class="alerta exito">Anuncio actualizado correctamente</p>
          <?php elseif($resultado === '3'): ?>
          <p class="alerta exito">Anuncio eliminado correctamente</p>
        <?php endif ?>

        <a href="/frostinmo/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

        <table class="propiedades">
          <thead>
            <tr>
              <th>ID</th>
              <th>Título</th>
              <th>Imagen</th>
              <th>Precio</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
            <?php while($propiedad = mysqli_fetch_assoc($propiedades)): ?>
            <tr>
              <td><?= $propiedad['id'] ?></td>
              <td><?= $propiedad['titulo'] ?></td>
              <td><img src="/frostinmo/imagenes/<?= $propiedad['imagen'] ?>" class="imagen-tabla" alt=""></td>
              <td>$<?= $propiedad['precio'] ?></td>
              <td>
                <form method="POST" class="w-100">
                  <input type="hidden" name="id" value="<?= $propiedad['id'] ?>">
                  <input type="submit" name="eliminar" value="Eliminar" href="#" class="boton boton-rojo-block">
                </form>
                
                <a href="/frostinmo/admin/propiedades/actualizar.php?id=<?= $propiedad['id'] ?>" class="boton boton-azul-block">Actualizar</a>
              </td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
    </main>

<?php
  mysqli_close($db);

  incluirTemplate('footer');
?>
