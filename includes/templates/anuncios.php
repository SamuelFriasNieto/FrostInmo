<?php 

$db = conectarDB();

$query = "SELECT * FROM propiedades LIMIT $limite ";

$resultado = mysqli_query($db,$query);

?>

<div class="contenedor-anuncios">
        <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
        <div class="anuncio">

            <img loading="lazy" src="/frostinmo/imagenes/<?= $propiedad['imagen'] ?>" alt="anuncio" />

          <div class="contenido-anuncio">
            <h3><?= $propiedad['titulo'] ?></h3>
            <p>
              <?= $propiedad['descripcion'] ?>
            </p>
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

            <a class="boton boton-azul-block" href="anuncio.php?id=<?= $propiedad['id'] ?>"
              >Ver Apartamento</a
            >
          </div>
        </div>
        <?php endwhile; ?>
        
      </div>