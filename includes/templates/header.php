<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FrostInmo</title>
    <link rel="stylesheet" href="/frostinmo/build/css/app.css" />
  </head>
  <body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
      <div class="contenedor contenido-header">
        <div class="barra">
          <a href="index.php"
            ><h2 class="logo">Frost<span>Inmo</span></h2></a
          >
          
          <div class="mobile-menu">
            <img src="build/img/barras.svg" alt="Icono hamburguesa">
          </div>

          <div class="derecha">
            <img class="dark-mode" src="build/img/dark-mode.svg" alt="dark mode">
            <nav class="navegacion">
              <a href="nosotros.php">Nosotros</a>
              <a href="anuncios.php">Anuncios</a>
              <a href="blog.php">Blog</a>
              <a href="contacto.php">Contacto</a>
            </nav>
          </div>

          
        </div>

        <?php if($inicio) { ?>
        <h1>Venta de casas y departamentos exclusivos de lujo</h1>
        <?php } ?>
      </div>
    </header>