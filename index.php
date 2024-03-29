<?php
  require 'includes/app.php';
  incluirTemplate('header', $inicio = true);
?>

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

    <section class="seccion contenedor">
      <h2>Casas y Apartamentos en venta</h2>

      <?php 
      $limite = 3; 
      include 'includes/templates/anuncios.php';
      
      ?>

      <div class="alinear-derecha">
        <a class="boton boton-verde" href="anuncios.html">Ver Todas</a>
      </div>
    </section>

    <section id="imagen" class="imagen-contactar">
      <h2>Encuentra la casa de tus sueños</h2>
      <p>
        Llena el formulario de contacto y un asesor se pondrá en contacto
        contigo en breve
      </p>
      <a class="boton boton-azul" href="contacto.html">Contáctanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
      <section class="blog">
        <h3>Nuestro Blog</h3>

        <article class="entrada-blog">
          <div class="imagen">
            <picture>
              <source srcset="build/img/blog1.webp" type="image/webp" />
              <source srcset="build/img/blog1.jpg" type="image/jpeg" />
              <img
                loading="lazy"
                src="build/img/blog1.jpg"
                alt="Texto entrada blog"
              />
            </picture>
          </div>

          <div class="texto-entrada">
            <a href="entrada.html">
              <h4>Terraza en el techo de tu casa</h4>
              <p class="informacion-meta">Escrito el: <span>12/02/2024</span> por: <span>Admin</span></p>

              <p>
                Consejos para construir una terraza en el techo de tu casa con
                los mejores materiales y ahorrando dinero
              </p>
            </a>
          </div>
        </article>

        <article class="entrada-blog">
          <div class="imagen">
            <picture>
              <source srcset="build/img/blog2.webp" type="image/webp" />
              <source srcset="build/img/blog2.jpg" type="image/jpeg" />
              <img
                loading="lazy"
                src="build/img/blog2.jpg"
                alt="Texto entrada blog"
              />
            </picture>
          </div>

          <div class="texto-entrada">
            <a href="entrada.html">
              <h4>Guia para la decoración de tu hogar</h4>
              <p class="informacion-meta">Escrito el: <span>12/02/2024</span> por: <span>Admin</span></p>

              <p>
                Maximiza el espacio de tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
              </p>
            </a>
          </div>
        </article>
      </section>

      <section class="testimoniales">
        <h3>Testimonios</h3>

        <div class="testimonial">
          <blockquote>
            El personal se comportó de una forma excelente, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
          </blockquote>
          <p>- Samuel Frias Nieto</p>
        </div>
      </section>
    </div>

<?php
  incluirTemplate('footer');
?>