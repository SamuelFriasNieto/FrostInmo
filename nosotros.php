<?php
  require 'includes/app.php';
  incluirTemplate('header');
?>

    <section class="contenedor seccion">
      <h1>Conoce sobre Nosotros</h1>
      <div class="contenido-nosotros">
        <div class="imagen">
          <picture>
            <source srcset="build/img/nosotros.webp" type="image/webp" />
            <source srcset="build/img/nosotros.jpg" type="image/jpeg" />
            <img
              loading="lazy"
              src="build/img/nosotros.jpg"
              alt="Imagen Nosotros"
            />
          </picture>
        </div>

        <div class="texto-nosotros">
          <blockquote>25 Años de experiencia</blockquote>

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
      </div>
    </section>

    <main class="contenedor seccion">
      <h1>Más Sobre Nosotros</h1>

      <div class="iconos-nosotros">
        <div class="icono">
          <img
            src="build/img/icono1.svg"
            alt="Icono seguridad"
            loading="lazy"
          />
          <h3>Seguridad</h3>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore
            iusto deserunt vel eos assumenda odio, sit quas velit! Alias aut
            itaque, ipsa quae vel officia sequi similique quasi nulla eaque?
          </p>
        </div>

        <div class="icono">
          <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy" />
          <h3>Precio</h3>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore
            iusto deserunt vel eos assumenda odio, sit quas velit! Alias aut
            itaque, ipsa quae vel officia sequi similique quasi nulla eaque?
          </p>
        </div>

        <div class="icono">
          <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy" />
          <h3>Tiempo</h3>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore
            iusto deserunt vel eos assumenda odio, sit quas velit! Alias aut
            itaque, ipsa quae vel officia sequi similique quasi nulla eaque?
          </p>
        </div>
      </div>
    </main>

    <?php
  incluirTemplate('footer');
?>
