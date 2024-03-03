<?php
  require 'includes/app.php';
  incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
      <h1>Guia para la decoración de tu hogar</h1>

      <picture>
        <source srcset="build/img/destacada2.webp" type="image/webp" />
        <source srcset="build/img/destacada2.jpg" type="image/jpeg" />
        <img
          class="border-radius"
          loading="lazy"
          src="build/img/destacada2.jpg"
          alt="Imagen Hogar"
        />
      </picture>

      <p class="informacion-meta">Escrito el: <span>12/02/2024</span> por: <span>Admin</span></p>

      <div class="resumen-propiedad">
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit saepe
          aliquid necessitatibus beatae possimus fugiat dignissimos, libero
          magni expedita et dolor at. Officia ex nam delectus facere. Adipisci,
          nostrum perspiciatis! Lorem ipsum dolor sit amet consectetur
          adipisicing elit. Impedit atque deserunt doloremque dolore accusamus
          et numquam commodi id quaerat! Nostrum est obcaecati dignissimos
          nesciunt ut, provident accusamus nulla similique iusto?
        </p>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam
          earum, officia a sed aliquam aliquid. Sapiente facilis ipsum
          repellendus eligendi porro possimus iste repudiandae. Placeat cum quis
          nostrum quae praesentium.
        </p>
      </div>
    </main>

    <?php
  incluirTemplate('footer');
?>
