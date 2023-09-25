<?php
$error_form = false;

//Se comrpueban errores
if (isset($_POST["btnGuardar"])) {

    $error_nombre = $_POST["nombre"] == "";
    $error_sexo = !isset($_POST["sexo"]);
    $error_form = $error_nombre || $error_sexo ;
}

//Si no hay errores en el formulario
if (isset($_POST["btnGuardar"]) && !$error_form) {
  require "vistas/vista_datos.php";
} else {
    require "vistas/vista_fomulario.php";
}
?>