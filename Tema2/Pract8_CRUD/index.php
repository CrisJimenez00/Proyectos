<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio crud</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            text-align: center;
        }

        th {
            background-color: #CCC;
        }
        table img{width: 7rem;}
    </style>
</head>

<body>
    <h1>Listado de los usuarios</h1>
    <?php
    //realizamos la conexión
    try {
        $conexion = mysqli_connect("localhost", "jose", "josefa", "bd_foro");
        mysqli_set_charset($conexion, "utf8");
    } catch (Exception $e) {
        die("<p>No ha podido conectarse a la base de datos: " . $e->getMessage() . "</p>");
    }

    //Momento consulta
    try {
        //Creamos la consulta
        $consulta = "select * from usuarios";
        $resultado = mysqli_query($conexion, $consulta);
    } catch (Exception $e) {
        mysqli_close($conexion);
        die("<p>No ha realizarse la consulta: " . $e->getMessage() . "</p>");
    }


    echo "<table>";
    echo "<tr><th>Nombre de usuario</th><th>Borrar</th><th>Editar</th></tr>";
    while($tupla=mysqli_fetch_assoc($resultado)){
        echo "<tr>";
        echo "<td>".$tupla["nombre"]."</td>";
        echo "<td><img src='images/borrar.png' alt='Borrar usuario'></td>";
        echo "<td><img src='images/editar.png' alt='Editar usuario'></td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
    <form action="usuario_nuevo.php" method="post">

        <button type="submit" name="btnNuevoUsuario">Nuevo usuario</button>
    </form>
    <?php

    //Nos aseguramos que después cierre la conexión
    mysqli_close($conexion);
    ?>

</body>

</html>