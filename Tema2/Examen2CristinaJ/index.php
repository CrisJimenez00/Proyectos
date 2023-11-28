<?php
if(isset($_POST["btnBorrarNota"])){
    if (!isset($conexion)) {
        try {
            $conexion = mysqli_connect("localhost", "jose", "josefa", "bd_exam_colegio");
            mysqli_set_charset($conexion, "utf8");
        } catch (Exception $e) {
            die("<p>No ha podido conextarse con la base de datos: " . $e->getMessage() . "</p>");
        }
    }
    try {
        $consulta = "select * from alumnos";
        $resultado = mysqli_query($conexion, $consulta);
    } catch (Exception $e) {
        mysqli_close($conexion);
        die(error_page("Examen2 DWESE 22-23", "<p>No ha podido realizarse la consulta" . $e->getMessage() . "</p>"));
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen2 DWESE Curso 22-23</title>
    <style>
        table,
        th,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th {
            background-color: lightgray;
        }
    </style>
</head>

<body>
    <h1>Notas de los alumnos</h1>
    <?php
    if (!isset($conexion)) {
        try {
            $conexion = mysqli_connect("localhost", "jose", "josefa", "bd_exam_colegio");
            mysqli_set_charset($conexion, "utf8");
        } catch (Exception $e) {
            die("<p>No ha podido conextarse con la base de datos: " . $e->getMessage() . "</p>");
        }
    }
    try {
        $consulta = "select * from alumnos";
        $resultado = mysqli_query($conexion, $consulta);
    } catch (Exception $e) {
        mysqli_close($conexion);
        die("<p>No se ha podido realizar la consulta: " . $e->getMessage() . "</p>");
    }
    //Miramos que las líneas de datos sean superiores a 0

    if (mysqli_num_rows($resultado) > 0) {
        echo "<form action='index.php' method='post'>";
        echo "<p>Seleccione a un alumno: ";
        echo "<select name='cod_alu' id='alumno'>";
        //Mientras haya nombre de alumnos, que salgan en el select
        while ($tupla = mysqli_fetch_assoc($resultado)) {
            if (isset($_POST["cod_alu"]) && $_POST["cod_alu"] == $tupla["cod_alu"]) {
                echo "<option value='" . $tupla["cod_alu"] . "' selected>" . $tupla["nombre"] . "</option>";
                $nombre_alumno = $tupla["nombre"];
            } else {
                echo "<option value='" . $tupla["cod_alu"] . "'>" . $tupla["nombre"] . "</option>";
            }
        }
        echo "</select>";
        //creamos un botón el cual va a hacer que salga el código
        echo "<button type='submit' name='btnNotas'>Ver Notas</button>";
        echo "</form>";
        echo "</p>";
        //En caso de que se seleccione el alumno correctamente, que aparezca la tabla
        if (isset($_POST["btnNotas"])) {
            $cod_alu = $_POST["cod_alu"];
            echo "<h2>Notas del alumno: " . $nombre_alumno . "</h2>";
            try {
                $consulta = "SELECT asignaturas.cod_asig, asignaturas.denominacion, notas.nota FROM asignaturas,notas WHERE asignaturas.cod_asig AND notas.cod_alu='" . $cod_alu . "'";
                $resultado = mysqli_query($conexion, $consulta);
            } catch (Exception $e) {
                mysqli_close($conexion);
                die("<p>No se ha podido realizar la consulta: " . $e->getMessage() . "</p>");
            }
            if (mysqli_num_rows($resultado) > 0) {
                echo "<table>";
                echo "<tr><th>Asignatura</th><th>Nota</th><th>Acción</th></tr>";
                while ($tupla = mysqli_fetch_assoc($resultado)) {
                   
                    echo "<tr>";
                    echo "<td>" . $tupla["denominacion"] . "</td>";
                    echo "<td>" . $tupla["nota"] . "</td>";
                    echo "<td><form action='index.php' method='post'><button type='submit' name='btnEditarNota' value='".$cod_alu."'>Editar</button>-<button type='submit' name='btnBorrarNota' value='".$cod_alu."'>Borrar</button></form></td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
        try {
            $consulta = "SELECT * FROM asignaturas WHERE cod_asig not in (select asignaturas.cod_asig, from asignaturas, notas where asignaturas.cod_asig=notas.cod_asig and notas.cod_asig='".$cod_alu."')";
            $resultado = mysqli_query($conexion, $consulta);
        } catch (Exception $e) {
            mysqli_close($conexion);
            die("<p>No se ha podido realizar la consulta: " . $e->getMessage() . "</p>");
        }
    if(mysqli_num_rows($resultado)>0){
        ?>
        <form action="index.php">
            <p><label for="asignatura">Asignaturas que le quedan por claificar</label></p>
            <input type="hidden" name="alumno" value="<?php echo $cod_alu; ?>">
            <select name="asignatura" id="asignatura">
                <?php
                while($tupla=mysqli_fetch_assoc($resultado)){
                    echo "<option value='".$tupla["cod_asig"]."'>".$tupla["denominacion"]."</option>";

                }
                ?>
            </select>
            <button type="submit" name="btnCalificar">Calificar</button>
        </form>
        <?php
    }
    } else {
        echo "<p>En estos momentos no tenemos ningún alumno registrado en la BD</p>";
    }

    mysqli_free_result($resultado);
    mysqli_close($conexion);
    ?>
</body>

</html>