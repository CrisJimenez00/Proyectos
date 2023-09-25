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
                <option value="Málaga" <?php
                                        if (isset($_POST["nacimiento"]) && $_POST["nacimiento"] == "Málaga") {
                                            echo "selected";
                                        }
                                        ?>>Málaga</option>
                <option value="Sevilla" <?php
                                        if (isset($_POST["nacimiento"]) && $_POST["nacimiento"] == "Sevilla") {
                                            echo "selected";
                                        }
                                        ?>>Sevilla</option>
                <option value="Cádiz" <?php
                                        if (!isset($_POST["nacimiento"]) || (isset($_POST["nacimiento"]) && $_POST["nacimiento"] == "Cádiz")) {
                                            echo "selected";
                                        }
                                        ?>>Cádiz</option>
            </select>
        </p>
        <p>
            <label for="area">Comentarios:</label>
            <textarea name="comentarios" id="area"><?php if (isset($_POST["comentarios"])) {
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
        <button type="submit" name="btnBorrar">Borrar los datos introducidos</button>
    </form>
</body>

</html>