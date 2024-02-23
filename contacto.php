<?php
  include './includes/templates/header.php';
?>

    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
          <source srcset="build/img/destacada3.webp" type="image/webp">
          <source srcset="build/img/destacada3.jpg" type="image/jpeg">
          <img class="border-radius" src="build/img/destacada3.jpg" alt="Imagen contacto">
        </picture>

        <h2>Llene el formulario de contacto</h2>

        <form class="formulario" action="">
          <fieldset>
            <legend>Información personal</legend>
            <label for="nombre">Nombre</label>
            <input type="text" name="" id="nombre" placeholder="Tu nombre">

            <label for="email">E-mail</label>
            <input type="email" name="" id="email" placeholder="Tu Email">

            <label for="telefono">Teléfono</label>
            <input type="tel" name="" id="telefono" placeholder="Tu Teléfono">

            <label for="mensaje">Mensaje</label>
            <textarea name="" id="mensaje"></textarea>
          </fieldset>

          <fieldset>
            <legend>Información sobre la propiedad</legend>

            <label for="opciones">Vende o Compra:</label>
            <select name="" id="opciones">
              <option value="" disabled selected>-- Seleccione --</option>
              <option value="compra">Compra</option>
              <option value="vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input type="number" name="" id="presupuesto" placeholder="Tu Precio o Presupuesto">
          </fieldset>

          <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado</p>
            
            <div class="forma-contacto">
              <label for="contactar-telefono">Teléfono</label>
              <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

              <label for="contactar-email">E-mail</label>
              <input name="contacto" type="radio" value="email" id="contactar-email">
            </div>

            <p>Si eligió telefono elija la fecha y la hora para ser contactado</p>
            <label for="fecha">Fecha</label>
            <input type="date" name="" id="fecha">

            <label for="hora">Hora</label>
            <input type="time" name="" id="hora" min="09:00" max="10:00">
          </fieldset>

          <input type="submit" value="enviar" class="boton-verde" name="" id="">
        </form>
    </main>

    <?php
  include './includes/templates/footer.php';
?>
