<?php
require "src/ctes_funciones.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 9</title>
    <style>
        table,
        th,
        td,
        tr {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }

        th {
            background-color: lightgray;
        }

        table {
            width: 100%;
        }

        .enlace {
            border: none;
            background: none;
            cursor: pointer;
            color: blue;
            text-decoration: underline
        }

        img {
            height: 250px
        }
    </style>
</head>

<body>
    <h1>Video Club</h1>
    <h2>Películas</h2>
    <!--Tabla principal-->
    <p><strong>Listado de Películas</strong></p>
    <?php
    require "vistas/vista_tabla_principal.php";
    ?>
</body>

</html>