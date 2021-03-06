<?php
    session_start();
    $username = "";
    $email = "";
    $errors = array();

    $typeUsers = "";

    // connecto to the database
    $db = mysqli_connect('localhost', 'hlorenzo', '69ae1147b5', 'registration');

    //if the register button is clicked
    if(isset($_POST['register'])){
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

        // ensure that form fields are filled properly
        if(empty($username)) {
            array_push($errors, "* Se requiere el nombre de usuario"); 
        }
        if(empty($email)) {
            array_push($errors, "* Se requiere el correo");
        }
        if(empty($password_1)) {
            array_push($errors, "* Favor introducir la contraseña");
        }
        if($password_1 != $password_2) {
            array_push($errors, "* Las contraseña no son iguales");
        }

        // verificar el tipo de usuario
        switch(true)
        {
            case (isset($_POST[prestamista])):
                $typeUsers = "1";
                break;
            case (isset($_POST[prestatario])):
                $typeUsers = "2";
                break;
            default: 
                array_push($errors, "* Favor seleccionar Prestamista o Prestatario segun corresponda");
                $typeUsers = "0";
                break;
        }

        // if there are no errors, save user to database
        if(count($errors) == 0) {
            $password = md5($password_1); // encrypt password before storing in database (for security)
            $sql = "INSERT INTO users (username, email, password, typeUser) 
                        VALUES ('$username', '$email', '$password', '$typeUsers')";

            mysqli_query($db, $sql);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php'); // redirect to home page
        }
    }

    //log user in from login page
    if(isset($_POST['login'])){
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        
        // ensure that form fields are filled properly
        if(empty($username)) {
            array_push($errors, "* Se requiere el nombre de usuario"); 
        }
        if(empty($password)) {
            array_push($errors, "* Se requiere password");
        }

        if(count($errors) == 0) {
            $password = md5($password); // encrypt password before comparing with that from database
            $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result = mysqli_query($db, $query);
            if (mysqli_num_rows($result) == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                header('location: index.php'); // redirect to home page
            } else {
                array_push($errors, "Usuario o Contresaña incorrecta");
            }
        }
    }

    // logout

if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}

?>