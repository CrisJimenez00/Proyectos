<?php
try {
    $conexion = mysqli_connect(SERVIDOR_BD, USUARIO_BD, CLAVE_BD, NOMBRE_BD);
    mysqli_set_charset($conexion, "utf8");
} catch (Exception $e) {
    session_destroy();
    die(error_page("Primer login", "<p>no ha podido conectarse con la base de datos</p>"));
}
try {
    $consulta = "select usuario from usuarios where usuario='" . $_SESSION["usuario"] . "' and clave='" . $_SESSION["clave"] . "'";
    $resultado = mysqli_query($conexion, $consulta);
} catch (Exception $e) {
    session_destroy();
    mysqli_close($conexion);
    die(error_page("Primer login", "<p>no ha podido realizarse la consulta a la base de datos</p>"));
}
//Para saber si te han vaneado
if (mysqli_num_rows($resultado) <= 0) {
    mysqli_free_result($resultado);
    mysqli_close($conexion);
    session_unset();

    $_SESSION["seguridad"] = "Usted no se encuentra registrado en la base de datos";
    header("location:index.php");
    exit;
}
$datos_usuario_logueado = mysqli_fetch_assoc($resultado);

mysqli_free_result($resultado);
//ahora hago el control de actividad
if(time()-$_SESSION["ultima_accion"]>MINUTOS*1){
    mysqli_free_result($resultado);
    mysqli_close($conexion);
    session_unset();

    $_SESSION["seguridad"] = "Su tiempo de sesión ha caducado";
    header("location:index.php");
    exit;
}
?>