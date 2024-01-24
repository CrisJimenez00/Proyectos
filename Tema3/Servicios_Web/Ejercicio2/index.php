<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 php</title>
    <style>
        table {
            text-align: center;
        }

        table,
        th,
        td,
        tr {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 7px;
        }

        .enlace {
            border: none;
            background-color: white;
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>Listado de los Productos</h1>
    <?php
    define("DIR_SERV", "http://localhost/Proyectos/Tema3/Servicios_Web/Ejercicio1/servicios_rest");
    function consumir_servicios_REST($url, $metodo, $datos = null)
    {
        $llamada = curl_init();
        curl_setopt($llamada, CURLOPT_URL, $url);
        curl_setopt($llamada, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($llamada, CURLOPT_CUSTOMREQUEST, $metodo);
        if (isset($datos))
            curl_setopt($llamada, CURLOPT_POSTFIELDS, http_build_query($datos));
        $respuesta = curl_exec($llamada);
        curl_close($llamada);
        return $respuesta;
    }
    $url = DIR_SERV . "/productos";
    $respuesta = consumir_servicios_REST($url, "GET");
    $obj = json_decode($respuesta);
    if (!$obj) {
        die("<p>Error consumiendo el servicio</p>");
    }
    if (isset($obj->mensaje_error)) {
        die("<p>" . $obj->mensaje_error . "</p></body></html>");
    }
    //FORMULARIO NUEVO PRODUCTO
    if (isset($_POST["btnProducto"])) {
    ?>
        <form action="" method="post">
            <h2>Creando un Producto</h2>
            <p><label for="codigo">Código:</label>
                <input type="text" name="codigo" id="codigo">
            </p>
            <p><label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre">
            </p>
            <p><label for="nombreCorto">Nombre Corto:</label>
                <input type="text" name="nombreCorto" id="nombreCorto">
            </p>
            <p><label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
            </p>
            <p><label for="pvp">PVP:</label>
                <input type="text" name="pvp" id="pvp">
            </p>
<p>Seleccione una familia:</p>
        </form>
    <?php
    }
    ?>
    <table>
        <tr>
            <th>COD</th>
            <th>Nombre</th>
            <th>PVP</th>
            <th>
                <form action="index.php" method="post"><button name="btnProducto" class="enlace" type="submit">Producto+</button></form>
            </th>
        </tr>
        <?php

        foreach ($obj->productos as $tupla) {
            echo "<tr>";
            echo "<td>" . $tupla->cod . "</td>";
            echo "<td>" . $tupla->nombre_corto . "</td>";
            echo "<td>" . $tupla->PVP . "</td>";
        ?>
            <td>
                <form action="index.php" method="post"><button class="enlace" type="submit"><input type="hidden" name="btnEditar">Editar</button><button class="enlace" type="submit"><input type="hidden" name="btnBorrar">Borrar</button></form>
            </td>
        <?php
            echo "</tr>";
        }
        ?>
    </table>


</body>

</html>