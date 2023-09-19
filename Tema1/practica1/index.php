<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Rellena tu CV</h1>
    <form action="recogida.php" method="get" enctype="multipart/form-data">
        <p><label for="nombre">Nombre:</label></br>
            <input type="text" name="nombre" id="nombre">
            </br>
            <label for="apellidos">Apellidos:</label>
            </br>
            <input type="text" name="apellidos" id="apellidos">
            </br>
            <label for="dni">DNI:</label>
            </br>
            <input type="text" name="dni" id="dni">
            </br>
            <label for="clave">Contraseña:</label>
            </br>
            <input type="password" name="clave" id="clave">
            </br>
            Sexo</br>
            <input type="radio" name="sexo" id="hombre">
            <label for="hombre">Hombre</label></br>
            <input type="radio" name="sexo" id="mujer">
            <label for="mujer">Mujer</label>
        </p>
        <p>
            <label for="foto">Incluir mi foto:</label>
            <input type="file" name="foto" id="foto" accept="image/*">
        </p>
        <p>Nacido en:
            <select name="nacimiento" id="nacimiento">
                <option value="malaga">Málaga</option>
                <option value="sevilla">Sevilla</option>
                <option value="calaga">Cádiz</option>
            </select>
        </p>
        <p>
            <label for="area">Comentarios:</label>
            <textarea name="area"></textarea>
        </p>
        <p><input type="checkbox" name="boletin" id="boletin">
            <label for="boletin">Suscribirme al boletín de Novedades</label>
        </p>
        <button type="submit">Guardar Cambios</button>
        <button type="reset">Borrar los datos introducidos</button>
    </form>
</body>

</html>