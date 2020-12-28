<?php

//iniciar session y la conexion ala bd
require_once './includes/conexion.php';
//recoger datos del formulario
if (isset($_POST['email'])) {
    //borrar error antiguo 
    if (isset($_SESSION['error_login'])) {
        session_unset($_SESSION['error_login']);
    }

    //recojo datos del formularo
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    //hacer consulta para comprobar las credenciales del usuario

    $sql = "SELECT * FROM usuario WHERE  email ='$email'";
    $login = mysqli_query($db, $sql);

    if ($login && mysqli_num_rows($login) == 1) {
        $usuario = mysqli_fetch_assoc($login);
        //comprobar la contraseña/cifrar
        $verify = password_verify($password, $usuario['password']);
        if ($verify) {
            //utilizar session  para guardar los datos del usuario logueado
            $_SESSION['usuario'] = $usuario;
        } else {
            //si algo falla enviar una sesion con el fallo
            $_SESSION['error_login'] = "Login Incorrecto";
        }
    } else {
        //mensaje de error
        $_SESSION['error_login'] = "Login Incorrecto";
    }
}

//rediriger al index.php
header('Location:index.php');
