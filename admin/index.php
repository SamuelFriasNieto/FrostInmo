<?php
  require '../includes/config/database.php';
  $db = conectarDB();

  $query = "SELECT * FROM propiedades";

  $propiedades = mysqli_query($db,$query);

  require '../includes/funciones.php';
  incluirTemplate('header');

  $resultado = recoge('resultado') ?? null;
?>

    <main class="contenedor seccion">
        <h1>Administrador de FrostInmo</h1>
        <?php  if($resultado === '1'): ?>
          <p class="alerta exito">Anuncio creado correctamente</p>
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
                <a href="#" class="boton boton-rojo-block">Eliminar</a>
                <a href="#" class="boton boton-azul-block">Actualizar</a>
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
