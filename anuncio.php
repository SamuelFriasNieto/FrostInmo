<?php
  require 'includes/funciones.php';
  require 'includes/config/database.php';

  $db = conectarDB();

  $id = recoge('id');

  $query = "SELECT * FROM propiedades WHERE id = '$id'";
 
  $resultado = mysqli_query($db,$query);
  
  $propiedad = mysqli_fetch_assoc($resultado);
  incluirTemplate('header');

?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en venta frente al bosque</h1>

          <img class="border-radius" loading="lazy" src="/frostinmo/imagenes/<?= $propiedad['imagen'] ?>" alt="Imagen Hogar">

        <div class="resumen-propiedad">
            <p class="precio"><?= $propiedad['precio'] ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                  <img
                    loading="lazy"
                    src="build/img/icono_wc.svg"
                    alt="icono wc"
                  />
                  <p><?= $propiedad['wc'] ?></p>
                </li>
                <li>
                  <img
                    loading="lazy"
                    src="build/img/icono_estacionamiento.svg"
                    alt="icono estacionamiento"
                  />
                  <p><?= $propiedad['estacionamiento'] ?></p>
                </li>
                <li>
                  <img
                    loading="lazy"
                    src="build/img/icono_dormitorio.svg"
                    alt="icono habitaciones"
                  />
                  <p><?= $propiedad['habitaciones'] ?></p>
                </li>
              </ul>

              <p>
                <?= $propiedad['descripcion'] ?>
              </p>
        </div>
    </main>

    <?php
  incluirTemplate('footer');
?>
