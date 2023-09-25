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
        echo "<p><strong>Aficiones: </strong>";
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
        if (isset($_POST["deportes"]) || isset($_POST["lectura"]) || isset($_POST["otros"])) {
            echo "<ol>";

            if (isset($_POST["deportes"])) {
                echo "<li>Deportes</li>";
            }
            if (isset($_POST["lectura"])) {
                echo "<li>Lectura</li>";
            }
            if (isset($_POST["otros"])) {
                echo "<li>Otros</li>";
            }

            echo "</ol>";
        } else {
            echo "<p><b>No has seleccionado ninguna afición</b></p>";
        }
        echo "</p>";
        if($_POST["comentarios"]!= ""){
            echo "<p><strong>Comentarios: </strong>" . $_POST["comentarios"] . "</p>";
        }else{
            echo "<p><strong>No ha hecho ningún comentario </strong></p>";
        }
        
    
    ?>
</body>

</html>