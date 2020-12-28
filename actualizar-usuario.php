<?php

if (isset($_POST)) {
    //incluir la conexion ala base de datos
    require_once './includes/conexion.php';




    //recoger valores de formulario de registro
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre'])  : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;


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



    $guardar_usuario = false;
    if (count($errores) == 0) {
        $guardar_usuario = true;
        $usuario = $_SESSION['usuario'];

        //COMPROBAR QUE EL EMAIL NO EXISTA
        $sql = "SELECT email FROM usuario WHERE  email = '$email'";
        $isset_email = mysqli_query($db, $sql);
        $isset_user = mysqli_fetch_assoc($isset_email);
        if ($isset_user['id'] == $usuario['id'] || empty($isset_user)) {

            //INSERTAR USUARIO EN LA BASE DE DATOS TABLA CORRESPONDIENTE
            $usuario = $_SESSION['usuario'];
            $sql = "UPDATE usuario SET
                nombre = '$nombre',
                apellido = '$apellidos',
                email = '$email'
                WHERE id =" . $usuario['id'];

            $guardar = mysqli_query($db, $sql);

            //var_dump(mysqli_error($db));
            //die();

            if ($guardar) {
                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['apellido'] = $apellidos;
                $_SESSION['usuario']['email'] = $email;

                $_SESSION['completado'] = "Sus Datos Se han Actualizado!";
            } else {
                $_SESSION['errores']['general'] = "fallo al Actualizar Los Datos de usuario";
            }
        } else {
            $_SESSION['errores']['general'] = "El Correo ya Existe";
        }
    } else {
        $_SESSION['errores'] = $errores;
    }
}

header('Location: mis-datos.php');
