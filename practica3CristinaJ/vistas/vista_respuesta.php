<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos</title>
</head>

<body>
    <h1>Datos recogidos</h1>
    <?php

    if (isset($_POST["btnGuardar"])) {
        echo "<p><strong>Nombre: </strong>" . $_POST["nombre"] . "</p>";
        echo "<p><strong>Apellidos: </strong>" . $_POST["apellidos"] . "</p>";
        echo "<p><strong>DNI: </strong>" . $_POST["dni"] . "</p>";
        echo "<p><strong>Contraseña: </strong>" . $_POST["clave"] . "</p>";
        echo "<p><strong>Sexo: </strong>" . $_POST["sexo"] . "</p>";
        echo "<p><strong>Nacimiento: </strong>" . $_POST["nacimiento"] . "</p>";
        echo "<p><strong>Comentarios: </strong>" . $_POST["comentarios"] . "</p>";
        if (isset($_POST["subscripcion"])) {
            echo "<p><strong>Subscripcion: </strong> Si </p>";
        } else {
            echo "<p><strong>Subscripcion: </strong> No </p>";
        }
    } else {
        header("Location:index.php");
    }
    ?>
</body>

</html>