<?php
$error_form = false;

//Se comrpueban errores
if (isset($_POST["btnGuardar"])) {

    $error_nombre = $_POST["nombre"] == "";
    $error_apellidos = $_POST["apellidos"] == "";
    $error_clave = $_POST["clave"] == "";
    $error_sexo = !isset($_POST["sexo"]);
    $error_comentarios = $_POST["comentarios"] == "";
    $error_form = $error_nombre || $error_apellidos || $error_clave || $error_sexo || $error_comentarios;
}

//Si no hay errores en el formulario
if (isset($_POST["btnGuardar"]) && !$error_form) {
  require "vistas/vista_respuesta.php";
} else {
    require "vistas/vista_formulario.php";
}
?>