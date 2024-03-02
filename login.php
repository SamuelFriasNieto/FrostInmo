<?php
    require 'includes/config/database.php';
    require 'includes/funciones.php';
    $db = conectarDB();

    $errores = [];

    if(isset($_REQUEST['enviar'])) {
       $email = mysqli_real_escape_string($db, filter_var(recoge('email'),FILTER_VALIDATE_EMAIL));

       $password = mysqli_real_escape_string($db, recoge('password'));

       if(!$email) {
            $errores['email'] = 'Error en el campo Email';
       }
       if(!$password) {
            $errores['password'] = 'Error en el campo Password';
       }

        if(empty($errores)) {
            $query = "SELECT * FROM usuarios WHERE email = '$email'";
            $resultado = mysqli_query($db,$query);
            if($resultado->num_rows) {
                $usuario = mysqli_fetch_assoc($resultado);

                if(password_verify($password, $usuario['password'])) {
                    session_start();

                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;
                    header('Location:/frostinmo/admin');
                } else {
                    $errores['password'] = 'El password es incorrecto';
                }
            } else {
                $errores['email'] = 'El usuario no existe';
            }
        }
    }



    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <?php foreach($errores as $error): ?>
            <p class="alerta error"><?= $error ?></p>
        <?php endforeach; ?>

        <form method="POST" class="formulario">
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="Tu Email">

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Tu Password">

        </fieldset>

        <input class="boton boton-verde" type="submit" name="enviar" value="Iniciar Sesión">

        </form>
    </main>

    <?php
  incluirTemplate('footer');
?>
