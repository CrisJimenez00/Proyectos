<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>

<body>
    <h1>Esta es mi super página</h1>
    <form action="datos.php" method="post">
        <p><label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre">
        </p>
        <p>Nacido en:
            <select name="nacimiento" id="nacimiento">
                <option value="Málaga">Málaga</option>
                <option value="Sevilla">Sevilla</option>
                <option value="Cádiz" selected>Cádiz</option>
            </select>
        </p>
        <p>Sexo</br>
            <input type="radio" name="sexo" id="hombre" value="Hombre" />
            <label for="hombre">Hombre</label></br>
            <input type="radio" name="sexo" id="mujer" value="Mujer" />
            <label for="mujer">Mujer</label>
        </p>
        <p>Aficiones: 
            <label for="deportes">Deportes</label> 
            <input type="checkbox" name="aficiones[]" id="deportes" value="deportes">
            <label for="lectura">Lectura</label> 
            <input type="checkbox" name="aficiones[]" id="lectura" value="lectura">
            <label for="otros">Otros</label> 
            <input type="checkbox" name="deportes[]" id="otros" value="otros">
        </p>
        <p>
            <label for="area">Comentarios:</label>
            <textarea name="comentarios" id="area"></textarea>
        </p>
        <button type="submit" name="btnGuardar">Enviar</button>
    </form>
</body>

</html>