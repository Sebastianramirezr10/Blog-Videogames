<?php


if (isset($_POST)) {
    //incluir la conexion ala base de datos
    require_once './includes/conexion.php';

    $nombre = isset($_POST['nombre']) ?  mysqli_real_escape_string($db, $_POST['nombre']) : false;


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

    if (count($errores) == 0) {
        $sql = "INSERT INTO categorias VALUES (NULL,'$nombre' )";
        echo  var_dump($sql);
        $guardar = mysqli_query($db, $sql);
    }
}
header('Location:index.php');
