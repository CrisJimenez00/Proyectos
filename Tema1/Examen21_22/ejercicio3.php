<?php
if (isset($_POST["btnSeparar"])) {
    $error_formulario = $_POST["texto"] == "";
}
//Me cuenta las letras, no las palabras
function mi_explode($texto, $separador)
{
    $contador = 0;
    $contador2=0;
    $array_palabras = [];
    while (isset($texto[$contador])) {
        if ($texto[$contador] == $separador) {
            $contador++;
        } else {
            $array_palabras[$contador2] .= $texto[$contador];
            $contador++;
            $contador2++;
        }
    }
    return $array_palabras;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 examen</title>
</head>

<body>
    <form action="ejercicio3.php" method="post">
        <p> <select name="separador" id="separador">
                <option value=".">.(punto)</option>
                <option value=",">,(coma)</option>
                <option value=";">;(punto y coma)</option>
                <option value=":">:(dos puntos)</option>
                <option value=" "> (espacio)</option>
            </select>
            <label for="texto">Inserte un texto</label>
            <input type="text" name="texto" id="texto" value="<?php
                                                                if (isset($_POST["texto"])) {
                                                                    echo $_POST["texto"];
                                                                }
                                                                ?>">
        </p>
        <button type="submit" name="btnSeparar">Separar</button>
    </form>
    <?php
    if (isset($_POST["btnSeparar"]) && !$error_formulario) {

        echo "<p>Tiene una longitud de: " . count(mi_explode($_POST["texto"], $_POST["separador"])) . " palabras</p>";
    }
    ?>
</body>

</html>