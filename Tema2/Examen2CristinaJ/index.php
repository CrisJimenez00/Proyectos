<?php
require "src/ctes_funciones.php";
if (!isset($conexion)) {
    try {
        $conexion = mysqli_connect(SERVIDOR_BD, USUARIO_BD, CLAVE_BD, NOMBRE_BD);
        mysqli_set_charset($conexion, "utf8");
    } catch (Exception $e) {
        die("<p>No ha podido conextarse con la base de datos: " . $e->getMessage() . "</p>");
    }
}
try {
    $consulta = "select * from alumnos";
    $resultado = mysqli_query($conexion, $consulta);
} catch (Exception $e) {
    die("<p>No se ha podido realizar la consulta: " . $e->getMessage() . "</p>");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen2 DWESE Curso 22-23</title>
</head>

<body>
    <h1>Notas de los alumnos</h1>
    <?php
    //Miramos que las líneas de datos sean superiores a 0
    
    if (mysqli_num_rows($resultado) > 0) {
        echo "<form action='index.php' method='post'>";
        echo "<p>Seleccione a un alumno: ";
        echo "<select name='cod_alu' id='alumno'>";
        //Mientras haya nombre de alumnos, que salgan en el select
        while ($tupla = mysqli_fetch_assoc($resultado)) {
            if(isset($_POST["cod_alu"])&&$_POST["cod_alu"]==$tupla["cod_alu"]){
            echo "<option value='". $tupla["cod_alu"] . "' selected>" . $tupla["nombre"] . "</option>";
            $nombre_alumno=$tupla["nombre"];
        }else{
            echo "<option value='". $tupla["cod_alu"] . "'>" . $tupla["nombre"] . "</option>";
        }
        
    }
        echo "</select>";
        //creamos un botón el cual va a hacer que salga el código
        echo "<button type='submit' name='btnNotas'>Ver Notas</button>";
        echo "</form>";
        echo "</p>";
        //En caso de que se seleccione el alumno correctamente, que aparezca la tabla
    if(isset($_POST["btnNotas"])){
        echo "<h2>Notas del alumno: ".$nombre_alumno."</h2>";
    }
    } else {
        echo "<p>En estos momentos no tenemos ningún alumno registrado en la BD</p>";
    }

    
    ?>
</body>

</html>