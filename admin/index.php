<?php
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
    </main>

    <?php
  incluirTemplate('footer');
?>
