<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registrar usuario prestamista o prestatario</title>    
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>    
    <body>
        <div class="header">
            <h2>Registrarse</h2>
        </div>

        <form method="post" action="register.php">
            <!-- display validation errors here -->    
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>Nombre de usuario</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="input-group">
                <label>Correo</label>
                <input type="text" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="input-group">
                <label>Contraseña</label>
                <input type="password" name="password_1">
            </div>
            <div class="input-group">
                <label>Confirmar Contraseña</label>
                <input type="password" name="password_2">
            </div>
            <div class="input-group">
                <button type="submit" name="register" class="btn">Enviar</button>
            </div>
            <p>
                ¿Ya tienes una cuenta? <a href="login.php">Ingresar</a>
            </p>
        </form>
    </body>
</html>