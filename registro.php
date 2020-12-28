<?php

if (isset($_POST)) {
    //incluir la conexion ala base de datos
    require_once './includes/conexion.php';
    //INICIAR LA SESION
    if (!isset($_SESSION)) {
        session_start();
    }



    //recoger valores de formulario de registro
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre'])  : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $contraseña = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

    //Array Errores
    $errores = array();

    //validar datos antes de guardarlos en la base de datos

    //VALIDAR CAMPO NOMBRE
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validate = true;
    } else {
        $nombre_validate = false;
        $errores['nombre'] = "Digite un Nombre Valido";
    }
    //VALIDAR CAMPO APELLIDOS
    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
        $apellidos_validate = true;
    } else {
        $apellidos_validate = false;
        $errores['apellidos'] = "Digite un Apellido Valido";
    }

    //VALIDAR CAMPO EMAIL
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validate = true;
    } else {
        $email_validate = false;
        $errores['email'] = "Digite un Email Valido";
    }

    //VALIDAR EL PASSWORD

    if (!empty($password)) {
        $password_validate = true;
    } else {
        $password_validate = false;
        $errores['password'] = "La Contraseña Esta Vacia";
    }

    $guardar_usuario = false;
    if (count($errores) == 0) {
        $guardar_usuario = true;
        //CIFRAR LA CONTRASEÑA
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);


        //INSERTAR USUARIO EN LA BASE DE DATOS TABLA CORRESPONDIENTE
        $sql = "INSERT INTO usuario VALUES(null,'$nombre','$apellidos','$email','$password_segura',CURDATE());";
        $guardar = mysqli_query($db, $sql);

        //var_dump(mysqli_error($db));
        //die();

        if ($guardar) {
            $_SESSION['completado'] = "El Registro Se Ha Completado Con Exito";
        } else {
            $_SESSION['errores']['general'] = "fallo al guardar el usuario";
        }
    } else {
        $_SESSION['errores'] = $errores;
    }
}

header('Location: index.php');
