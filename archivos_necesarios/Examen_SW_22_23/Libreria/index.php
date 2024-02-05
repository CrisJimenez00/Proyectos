<?php
if (isset($_POST["btnEntrar"])) {
    $error_usuario = $_POST["usuario"] == "";
    $error_clave = $_POST["clave"] == "";
    $error_form = $error_clave || $error_usuario;
}
function consumir_servicios_REST($url, $metodo, $datos = null)
{
    $llamada = curl_init();
    curl_setopt($llamada, CURLOPT_URL, $url);
    curl_setopt($llamada, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($llamada, CURLOPT_CUSTOMREQUEST, $metodo);
    if (isset($datos))
        curl_setopt($llamada, CURLOPT_POSTFIELDS, http_build_query($datos));
    $respuesta = curl_exec($llamada);
    curl_close($llamada);
    return $respuesta;
}
/*
function error_page($title, $cabecera, $mensaje)
{
    $html = '<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0">';
    $html .= '<title>' . $title . '</title></head>';
    $html .= '<body><h1>' . $cabecera . '</h1>' . $mensaje . '</body></html>';
    return $html;
}
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen 22_23</title>
</head>

<body>
    <h1>Libreria</h1>
    <?php
    if (!isset($_SESSION["usuario"])) {
        require "vistas/vista_login.php";
    ?>
       
    <?php
    } else {
        if ($_SESSION["tipo"] == "admin") {
            header("Location:admin/index.php");
        } else {
            require "vistas/vista_normal.php";
        }
    }
    ?>
</body>

</html>