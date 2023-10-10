<?php
    if(isset($_POST["btnCalcular"])){
        //FECHA1
        //Primero miramos si están los separadores bien puesto
        $buenos_separadores1=substr($_POST["fecha1"],2,1)=="/" && substr($_POST["fecha1"],5,1)=="/";
        //Como está bien, se podrá separar
        $array_numero1=explode("/", $_POST["fecha1"]);
        //Después nos aseguramos de que sean números
        $numeros_buenos1=is_numeric($array_numero1[0])&&is_numeric($array_numero1[1])&&is_numeric($array_numero1[2]);
        //Comprobamos la fecha
        $fecha_valida1=checkdate($array_numero1[1],$array_numero1[0],$array_numero1[2]);
        //$error_fecha=!$error_long1||!$buenos_separadores1||!$numeros_buenos1||!$fecha_valida1
        $error_fecha1=$_POST["fecha1"]==""||strlen($_POST["fecha1"])!=10||!$buenos_separadores1||!$numeros_buenos1||!$fecha_valida1;
        
        //FECHA2
        //Primero miramos si están los separadores bien puesto
        $buenos_separadores2=substr($_POST["fecha2"],2,1)=="/" && substr($_POST["fecha2"],5,1)=="/";
        //Como está bien, se podrá separar
        $array_numero2=explode("/", $_POST["fecha2"]);
        //Después nos aseguramos de que sean números
        $numeros_buenos2=is_numeric($array_numero2[0])&&is_numeric($array_numero2[1])&&is_numeric($array_numero2[2]);
        //Comprobamos la fecha
        $fecha_valida2=checkdate($array_numero2[1],$array_numero2[0],$array_numero2[2]);
        //$error_fecha=!$error_long1||!$buenos_separadores1||!$numeros_buenos2||!$fecha_valida2
        $error_fecha2=$_POST["fecha2"]==""||strlen($_POST["fecha2"])!=10||!$buenos_separadores2||!$numeros_buenos2||!$fecha_valida2;
        $error_formulario=$error_fecha1||$error_fecha2;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 fechas</title>
</head>
<body>
    <form action="ej1.php" method="post">
    <p><label for="fecha1">Introduzca una fecha(DD/MM/YYYY):</label>
    <input type="text" name="fecha1" id="fecha1" value="<?php
        if(isset($_POST["fecha1"])){ echo $_POST["fecha1"];}
    ?>">
    <!--Errores en el input fecha1-->
    </p>
    <p><label for="fecha2">Introduzca una fecha(DD/MM/YYYY):</label>
    <input type="text" name="fecha2" id="fecha2" value="<?php
        if(isset($_POST["fecha2"])){ echo $_POST["fecha2"];}
    ?>">
    <!--Errores en el input fecha2-->
    </p>
    <button type="submit" name="btnCalcular">Calcular</button>
    </form>
    <?php
    if(isset($_POST["btnCalcular"])&&!$error_formulario){
        //Resuelve el problema
    }
    ?>
</body>
</html>