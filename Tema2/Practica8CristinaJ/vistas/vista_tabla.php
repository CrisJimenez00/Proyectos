<?php
if (!isset($conexion)) {
    try {
        $conexion = mysqli_connect(SERVIDOR_BD, USUARIO_BD, CLAVE_BD, NOMBRE_BD);
        mysqli_set_charset($conexion, "utf8");
    } catch (Exception $e) {
        die("<p>No ha podido conectarse a la base de datos: " . $e->getMessage() . "</p></body></html>");
    }
}
try {
    $consulta = "select * from usuarios";
    $resultado = mysqli_query($conexion, $consulta);
} catch (Exception $e) {
    mysqli_close($conexion);
    die("<p>No se ha podido realizar la consulta: " . $e->getMessage() . "</p></body></html>");
}
echo "<table>";
echo "<th>#</th><th>Foto</th><th>Nombre</th><th><form action='index.php' method='post'><button type='submit' class='enlace' name='btnUsuarioNuevo'>Usuario+</button></form></th>";
while($tupla=mysqli_fetch_assoc($resultado)){
    echo "<tr>";
    echo "<td>".$tupla["id_usuario"]."</td>";
    echo "<td><img src='Img/".$tupla["foto"]."'></img></td>";
    echo "<td>".$tupla["nombre"]."</td>";
    echo "<td><form action='index.php' method='post'><button class='enlace' type='submit' value='".$tupla["id_usuario"]."' name='btnEditar' title='Editar usuario'>Editar</button>-<button class='enlace' type='submit' value='".$tupla["id_usuario"]."' name='btnBorrar' title='Borrar usuario'>Borrar</button></td></form>";
    echo "</tr>";
}

?>
