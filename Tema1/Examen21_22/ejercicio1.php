<?php
    if(isset($_POST["texto"])){
        $error_form=$_POST["texto"]=="";
    }
    function contador($texto){
        
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1 examen</title>
</head>

<body>
    <form action="ejercicio1.php" method="post">
        <label for="texto">Introduzca un texto</label>
        <input type="text" name="texto" id="texto" value="<?php if (isset($_POST["texto"])) {
                                                                echo $_POST["texto"];
                                                            } ?>">
        <button type="submit" name="btnCalcular">Calcular</button>
    </form>
</body>

</html>