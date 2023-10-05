<?php
if (isset($_POST["btnEnviar"])) {
    /*
    Se usa $_FILES y no $_POST debido a que ese input recoge un archivo y no un contenido válido para $_POST
        Tipos de errores con los file
        $_FILE["nombreArchivo"]["name"]    -> Nombre que tiene el archivo en el ordenador del usuario
        ---------------------->["error"]   -> Error al subirse
        ---------------------->["size"]    -> Tamaño del archivo
        ---------------------->["type"]    -> Tipo de archivo
        ---------------------->["tmp_name"]->Nombre con el que se almacena en el servidor (dice la dirección, dónde está y con qué nombre)

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
        <!--Es obligatorio usar el enctype="multipart/form-data" para que podamos trabajar con archivo(si no, no funciona)-->
        <form action="index.php" method="post" enctype="multipart/form-data">
            <p>
                <label for="archivo">Seleccione un archivo</label>
                <input type="file" name="archivo" id="archivo" accept="image/*">
                <?php
                if (isset($_POST["btnEnviar"]) && $error_archivo) {
                    if ($_FILES["archivo"]["name"] == "") {
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