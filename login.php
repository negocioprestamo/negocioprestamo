<?php include('server.php'); //prueba2 ?> 
<!DOCTYPE html>

<html>
    <head>
        <title>Registrar usuario prestamista o prestatario</title>    
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>    
    <body>
        <div class="header">
            <h2>Ingresar</h2>
        </div>

        <form method="post" action="login.php">
            <!-- display validation errors here -->    
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>Nombre de usuario</label>
                <input type="text" name="username">
            </div>
            <div class="input-group">
                <label>Contraseña</label>
                <input type="password" name="password">
            </div>
            <div class="input-group">
                <button type="submit" name="login" class="btn">Enviar</button>
            </div>
            <p>
                ¿No tienes una cuenta? <a href="register.php">Registrate</a>
            </p>
        </form>
    </body>
</html>