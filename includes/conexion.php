<?php
$servidor = 'localhost';
$usuario = 'sebas';
$password = '123';
$basededatos = 'vblog';

$db = mysqli_connect($servidor, $usuario, $password, $basededatos);

mysqli_query($db, "SET NAMES 'utf8'");


//INICIAR LA SESION
if (!isset($_SESSION)) {
    session_start();
}
