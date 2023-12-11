<?php

use function PHPSTORM_META\map;

session_name("Primer_login_23_24");
session_start();
require "src/func_ctes.php";
if (isset($_POST["btnSalir"])) {
    session_destroy();
    header("Location:index.php");
    exit;
}
if (isset($_SESSION["usuario"])) {
    //Por aquí estoy logueado
    //ESTO ES EL ARCHIVO DE SEGURIDAD
    require "vistas/vistas_seguridad.php";
    if ($datos_usuario_logueado["tipo"] == "admin") {
        require "vistas/vista_admin.php";
    } else {
        require "vistas/vista_logueado.php";
    }

    mysqli_close($conexion);
} else {
    require "vistas/vista_login.php";
}
