<?php
if (isset($_POST["btnEnviar"])) {
    /*
        Tipos de errores con los file
        $_FILE["nombreArchivo"]["name"]
        ---------------------->["error"]
        ---------------------->["size"]
        ---------------------->["type"]
        ---------------------->["tmp_name"]

    */
    $error_archivo = $_FILES["archivo"]["name"] == "" || $_FILES["archivo"]["error"] || !getimagesize($_FILES["archivo"]["tmp_name"]) || $_FILES["archivo"]["size"] > 500 * 1024;
}
if (isset($_POST["btnEnviar"]) && !$error_archivo) {
    echo "Info de imagen del archivo subido";
} else {


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Teoria subir Archivos</title>
    </head>

    <body>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <p>
                <label for="archivo">Seleccione un archivo</label>
                <input type="file" name="archivo" id="archivo" accept="image/*">
                <?php
                if (isset($_POST["btnEnviar"]) && $error_archivo) {
                    if($_FILES["archivo"]["name"]==""){
                        echo "No has seleccionado un archivo";
                    }
                    if ($_FILES["archivo"]["error"]) {
                        echo "No se ha podido subir el archivo al servidor";
                    } else if (!getimagesize($_FILES["archivo"]["tmp_name"])) {
                        echo "No se ha subido el archivo al servidor";
                    } else {
                        echo "El archivo seleccionado supera el peso límite";
                    }
                }
                ?>
            </p>
            <p><button type="submit" name="btnEnviar">Enviar</button></p>

        </form>
    </body>

    </html>
<?php
}
?>