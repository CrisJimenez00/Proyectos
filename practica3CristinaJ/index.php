<?php
$error_form = false;

//Se comrpueban errores
if (isset($_POST["btnGuardar"])) {

    $error_nombre = $_POST["nombre"] == "";
    $error_apellidos = $_POST["apellidos"] == "";
    $error_clave = $_POST["clave"] == "";
    $error_sexo = !isset($_POST["sexo"]);
    $error_comentarios = $_POST["comentarios"] == "";
    $error_form = $error_nombre || $error_apellidos || $error_clave || $error_sexo || $error_comentarios;
}

//Si no hay errores en el formulario
if (isset($_POST["btnGuardar"]) && !$error_form) {
    echo "<p><strong>Nombre: </strong>" . $_POST["nombre"] . "</p>";
    echo "<p><strong>Apellidos: </strong>" . $_POST["apellidos"] . "</p>";
    echo "<p><strong>DNI: </strong>" . $_POST["dni"] . "</p>";
    echo "<p><strong>Contraseña: </strong>" . $_POST["clave"] . "</p>";

    //Con checkbox y radio si no existe peta el programa, se tiene que usar isset si o si
    if (isset($_POST["sexo"])) {
        echo "<p><strong>Sexo: </strong>" . $_POST["sexo"] . "</p>";
    } else {
        echo "<p><strong>Sexo: </strong> No seleccionado</p>";
    }

    echo "<p><strong>Nacimiento: </strong>" . $_POST["nacimiento"] . "</p>";
    echo "<p><strong>Comentarios: </strong>" . $_POST["comentarios"] . "</p>";
    if (isset($_POST["subscripcion"])) {
        echo "<p><strong>Subscripcion: </strong> Si </p>";
    } else {
        echo "<p><strong>Subscripcion: </strong> No </p>";
    }
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            .error {
                color: red;
                font-weight: bold;
            }
        </style>
    </head>

    <body>
        <h1>Rellena tu CV</h1>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <p><label for="nombre">Nombre:</label></br>
                <input type="text" name="nombre" id="nombre" value="<?php
                                                                    if (isset($_POST["nombre"])) {
                                                                        echo $_POST["nombre"];
                                                                    }
                                                                    ?>" />
                <?php
                if (isset($_POST["btnGuardar"]) && $error_nombre) {
                    echo "<span class='error'>Campo vacio</span>";
                }
                ?>
                </br>
                <label for="apellidos">Apellidos:</label>
                </br>
                <input type="text" name="apellidos" id="apellidos" value="<?php
                                                                            if (isset($_POST["apellidos"])) {
                                                                                echo $_POST["apellidos"];
                                                                            }
                                                                            ?>" />
                <?php
                if (isset($_POST["btnGuardar"]) && $error_apellidos) {
                    echo "<span class='error'>Campo vacio</span>";
                }
                ?>
                </br>
                <label for="dni">DNI:</label>
                </br>
                <input type="text" name="dni" id="dni" />
                </br>
                <label for="clave">Contraseña:</label>
                </br>
                <input type="password" name="clave" id="clave" />
                <?php
                if (isset($_POST["btnGuardar"]) && $error_clave) {
                    echo "<span class='error'>Campo vacio</span>";
                }
                ?>
                </br>
                Sexo
                <?php
                if (isset($_POST["btnGuardar"]) && $error_sexo) {
                    echo "<span class='error'>Seleccione un sexo</span>";
                }
                ?>
                </br>
                <input type="radio" <?php
                                    if (isset($_POST["sexo"]) && $_POST["sexo"] == "Hombre") {
                                        echo "checked";
                                    }
                                    ?> name="sexo" id="hombre" value="Hombre" />
                <label for="hombre">Hombre</label></br>
                <input <?php
                        if (isset($_POST["sexo"]) && $_POST["sexo"] == "Mujer") {
                            echo "checked";
                        }
                        ?> type="radio" name="sexo" id="mujer" value="Mujer" />
                <label for="mujer">Mujer</label>

            </p>
            <p>
                <label for="foto">Incluir mi foto:</label>
                <input type="file" name="foto" id="foto" accept="image/*">
            </p>
            <p>Nacido en:
                <select name="nacimiento" id="nacimiento">
                    <option value="Málaga">Málaga</option>
                    <option value="Sevilla">Sevilla</option>
                    <option value="Cádiz" selected>Cádiz</option>
                </select>
            </p>
            <p>
                <label for="area">Comentarios:</label>
                <textarea name="comentarios" id="area" ><?php if (isset($_POST["comentarios"])) {
                                                            echo $_POST["comentarios"];
                                                        }
                                                        ?></textarea>
                <?php
                if (isset($_POST["btnGuardar"]) && $error_comentarios) {
                    echo "<span class='error'>Campo vacio</span>";
                }
                ?>
            </p>
            <p><input type="checkbox" name="subscripcion" id="boletin" />
                <label for="boletin">Suscribirme al boletín de Novedades</label>
            </p>
            <button type="submit" name="btnGuardar">Guardar Cambios</button>
            <button type="reset" name="btnBorrar">Borrar los datos introducidos</button>
        </form>
    </body>

    </html>
<?php

}
?>