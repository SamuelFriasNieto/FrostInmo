<?php 
  if(!isset($_SESSION)) {
    session_start();
  }

  $auth = isset($_SESSION['login']) ? true : false;
?>

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
          <a href="/frostinmo/index.php"
            ><h2 class="logo">Frost<span>Inmo</span></h2></a
          >
          
          <div class="mobile-menu">
            <img src="/frostinmo/build/img/barras.svg" alt="Icono hamburguesa">
          </div>

          <div class="derecha">
            <img class="dark-mode" src="/frostinmo/build/img/dark-mode.svg" alt="dark mode">
            <nav class="navegacion">
              <a href="/frostinmo/nosotros.php">Nosotros</a>
              <a href="/frostinmo/anuncios.php">Anuncios</a>
              <a href="/frostinmo/blog.php">Blog</a>
              <a href="/frostinmo/contacto.php">Contacto</a>
              <?php if($auth): ?>
                <a href="/frostinmo/cerrar-sesion.php">Cerrar Sesión</a>
              <?php endif; ?>
            </nav>
          </div>

          
        </div>

        <?php if($inicio) { ?>
        <h1>Venta de casas y departamentos exclusivos de lujo</h1>
        <?php } ?>
      </div>
    </header>