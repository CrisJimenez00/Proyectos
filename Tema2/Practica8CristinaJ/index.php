<?php
define('SERVIDOR_BD', "localhost");
define('USUARIO_BD', "jose");
define('CLAVE_BD', "josefa");
define('NOMBRE_BD', "bd_cv");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 8</title>
    <style>
        table {
            height: auto;
            width: 100%;
            text-align: center;
        }

        th {
            background-color: lightgray;
        }

        table,
        th,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        img {
            height: 5rem;
            width: auto;
        }

        .enlace {
            border: none;
            background: none;
            cursor: pointer;
            color: blue;
            text-decoration: underline
        }
    </style>
</head>

<body>
    <h1>Práctica 8</h1>

    <?php

    if (isset($_POST["btnUsuarioNuevo"])) {
        require "vistas/vista_nuevo.php";
    }
    ?>
    <h3>Listado de los usuarios</h3>
    <?php
    require "vistas/vista_tabla.php";
    ?>
</body>

</html>