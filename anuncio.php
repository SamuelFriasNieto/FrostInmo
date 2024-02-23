<?php
  require 'includes/funciones.php';
  incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en venta frente al bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img class="border-radius" loading="lazy" src="build/img/destacada.jpg" alt="Imagen Hogar">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$3,000,000</p>
            <ul class="iconos-caracteristicas">
                <li>
                  <img
                    loading="lazy"
                    src="build/img/icono_wc.svg"
                    alt="icono wc"
                  />
                  <p>3</p>
                </li>
                <li>
                  <img
                    loading="lazy"
                    src="build/img/icono_estacionamiento.svg"
                    alt="icono estacionamiento"
                  />
                  <p>3</p>
                </li>
                <li>
                  <img
                    loading="lazy"
                    src="build/img/icono_dormitorio.svg"
                    alt="icono habitaciones"
                  />
                  <p>4</p>
                </li>
              </ul>

              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit saepe
                aliquid necessitatibus beatae possimus fugiat dignissimos, libero
                magni expedita et dolor at. Officia ex nam delectus facere.
                Adipisci, nostrum perspiciatis! Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Impedit atque deserunt doloremque
                dolore accusamus et numquam commodi id quaerat! Nostrum est
                obcaecati dignissimos nesciunt ut, provident accusamus nulla
                similique iusto?
              </p>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam
                earum, officia a sed aliquam aliquid. Sapiente facilis ipsum
                repellendus eligendi porro possimus iste repudiandae. Placeat cum
                quis nostrum quae praesentium.
              </p>
        </div>
    </main>

    <?php
  incluirTemplate('footer');
?>
