<!-- In the register.php is define all things for the register page -->
<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registrar usuario prestamista o prestatario</title>    
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

            <div class="input-group">
                <input type="checkbox" name="skill" value="prestatario"> Prestatario</input>
                <input type="checkbox" name="skill" value="Prestamista"> Prestamista</input>
            </div>
            <p>
                ¿Ya tienes una cuenta? <a href="login.php">Ingresar</a>
            </p>

            <!-- this is the javascritp code 
                for the only choose one checkbox for -->
                <script>
                $(document).ready(function(){
                    $('.check').click(function() {
                        $('.check').not(this).prop('checked', false);
                        });
                    });
                </script>
        </form>
    </body>
</html>