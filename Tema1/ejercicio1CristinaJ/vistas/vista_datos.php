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
    echo "<p><strong>Nombre: </strong>" . $_POST["nombre"] . "</p>";
    echo "<p><strong>Nacimiento: </strong>" . $_POST["nacimiento"] . "</p>";
    //Con checkbox y radio si no existe peta el programa, se tiene que usar isset si o si
    if (isset($_POST["sexo"])) {
        echo "<p><strong>Sexo: </strong>" . $_POST["sexo"] . "</p>";
    } else {
        echo "<p><strong>Sexo: </strong> No seleccionado</p>";
    }
    //Forma simple, no sé recorrer aficiones[] para que me diga lo que contiene
    
    //la forma más básica
    /*if (isset($_POST["deportes"])) {
            echo $_POST["deportes"] . ",";
        } 
        if (isset($_POST["lectura"])) {
            echo $_POST["lectura"] . ",";
        } 
         if (isset($_POST["otros"])) {
            echo $_POST["otros"] ;
        }*/
    if (!isset($_POST["aficiones"])) {
        echo "<p><b>No has seleccionado ninguna afición</b></p>";
    } else if (count($_POST["aficiones"]) == 1) {
        echo "<p><b>La afición seleccionada ha sido: </b></p>";
        echo "<ol>";
        echo "<li>" . $_POST["aficiones"][0] . "</li>";
        echo "</ol>";
    } else {
        echo "<p><b>Las aficiones seleccionadas han sido: </b></p>";
        echo "<ol>";
        for ($i = 0; $i < count($_POST["aficiones"]); $i++) {
            echo "<li>" . $_POST["aficiones"][$i] . "</li>";
        }
        echo "</ol>";
    }
    /*if (isset($_POST["Deportes"]) || isset($_POST["Lectura"]) || isset($_POST["Otros"])) {
            echo "<ol>";

            if (isset($_POST["Deportes"])) {
                echo "<li>Deportes</li>";
            }
            if (isset($_POST["Lectura"])) {
                echo "<li>Lectura</li>";
            }
            if (isset($_POST["Otros"])) {
                echo "<li>Otros</li>";
            }

            echo "</ol>";
        } else {
            echo "<p><b>No has seleccionado ninguna afición</b></p>";
        }*/
    echo "</p>";
    if ($_POST["comentarios"] != "") {
        echo "<p><strong>El comentario ha sido: </strong>" . $_POST["comentarios"] . "</p>";
    } else {
        echo "<p><strong>No ha hecho ningún comentario </strong></p>";
    }
    ?>
</body>

</html>