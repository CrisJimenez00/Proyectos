<?php
if (isset($_POST["btnLogin"])) {
    $error_usuario = $_POST["usuario"] == "";
    $error_clave = $_POST["clave"] == "";
    $error_form = $error_clave || $error_usuario;
    if (!$error_form) {
        try {
            $conexion = mysqli_connect(SERVIDOR_BD, USUARIO_BD, CLAVE_BD, NOMBRE_BD);
            mysqli_set_charset($conexion, "utf8");
        } catch (Exception $e) {
            session_destroy();
            die(error_page("Primer login", "<p>no ha podido conectarse con la base de datos</p>"));
        }
        try {
            $consulta = "select usuario from usuarios where usuario='" . $_POST["usuario"] . "' and clave='" . md5($_POST["clave"]) . "'";
            $resultado = mysqli_query($conexion, $consulta);
        } catch (Exception $e) {
            session_destroy();
            mysqli_close($conexion);
            die(error_page("Primer login", "<p>no ha podido realizarse la consulta a la base de datos</p>"));
        }
        if (mysqli_num_rows($resultado) > 0) {
            //El usuario está registrado
            $_SESSION["usuario"] = $_POST["usuario"];
            $_SESSION["clave"]=md5($_POST["clave"]);
            $_SESSION["ultima_accion"]=time();
            mysqli_free_result($resultado);
            mysqli_close($conexion);
            header("Location:index.php");
            exit;
        } else {
            $error_usuario = true;
        }
        mysqli_free_result($resultado);
        mysqli_close($conexion);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primer login</title>
    <style>
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Primer login</h1>
    <form action="index.php" method="post">
        <p><label for="usuario">Usuario:</label><input type="text" name="usuario" id="usuario" value="<?php
                                                                                                        if (isset($_POST["usuario"])) {
                                                                                                            echo $_POST["usuario"];
                                                                                                        }
                                                                                                        ?>">
            <?php
            if (isset($_POST["btnLogin"]) && $error_usuario) {
                if ($_POST["usuario"] == "") {
                    echo "<span class='error'>*No se puede dejar el campo vacío*</span>";
                } else {
                    echo "<span class='error'>*Usuario/Contraseña no se encuentra registrado*</span>";
                }
            }
            ?></p>
        <p><label for="clave">Contraseña:</label><input type="password" name="clave" id="clave">
            <?php
            if (isset($_POST["btnLogin"]) && $error_clave) {
                echo "<span class='error'>*No se puede dejar el campo vacío*</span>";
            }
            ?></p>
        <p><button type="submit" name="btnLogin">Login</button></p>
    </form>
    <?php
    if($_SESSION["seguridad"]){
        echo "<p class='mensaje'>".$_SESSION["seguridad"]."</p>";
        session_destroy();
    }
    ?>
</body>

</html>