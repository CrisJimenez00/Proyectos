<?php
//3 letras iguales rima, 2 riman un poco, tildes da igual, mayus da igual

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <style>h1{
        text-align: center;
    }
    form{
        background-color: lightblue;
        border: 1px solid black;
        padding: 2em;
    }</style>
</head>

<body>
   
    
    <form action="Ej1.php" method="post">
    <h1>Ripidios-formulario</h1>
    <p>Dime dos palabras y te diré si riman o no</p>
        <p><label for="palabra1">Primera Palabra: </label>
            <input type="text" name="palabra1" id="palabra1" value="">
        </p>
        <p><label for="palabra2">Primera Palabra: </label>
            <input type="text" name="palabra2" id="palabra2">
        </p>
        <button type="submit" name="btnGuardar">Comparar</button>
    </form>
</body>

</html>