<form action="index.php" method="post">
    <p>
        <label for="usuario">Nombre de usuario: </label>
        <input type="text" name="usuario" id="usuario" value="<?php
                                                                if (isset($_POST["usuario"])) {
                                                                    echo $_POST["usuario"];
                                                                }
                                                                ?>">
        <?php
        if (isset($_POST["btnEntrar"]) && $error_form) {
            if ($_POST["usuario"] == "") {
                echo "*CAMPO VACÍO*";
            } else {
                echo "*El usuario no existe*";
            }
        }
        ?>
    </p>
    <p>
        <label for="clave">Contraseña: </label>
        <!--No guardo la clave por seguridad-->
        <input type="password" name="clave" id="clave">
        <?php
        if (isset($_POST["btnEntrar"]) && $error_form) {
            if ($_POST["clave"] == "") {
                echo "*CAMPO VACÍO*";
            }
        }
        ?>
    </p>
    <button type="submit" name="btnEntrar">Entrar</button>

</form>