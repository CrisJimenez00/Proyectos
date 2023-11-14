<h3>Formulario usuario nuevo</h3>
<form action="index.php" method="post">
    <label for="nombre">Nombre:</label>
    <br />
    <input type="text" name="nombre" id="nombre">
    <br />
    <label for="usuario">Usuario:</label>
    <br />
    <input type="text" name="usuario" id="usuario">
    <br />
    <label for="clave">Contraseña:</label>
    <br />
    <input type="text" name="clave" id="clave">
    <br />
    <label for="dni">DNI:</label>
    <br />
    <input type="text" name="dni" id="dni">
    <br />
    Sexo
    <br />
    <input type="radio" name="hombre" id="sexo" value="Hombre"><label for="hombre">Hombre</label>
    <br />
    <input type="radio" name="mujer" id="sexo" value="Mujer"><label for="mujer">Mujer</label>
    <br />
    Incluir mi foto(Máx.500KB)
    <input type="file" name="foto" id="foto" accept="img/*">

    <p>
        <button type="submit">Guardar Cambios</button>
        <button type="submit">Editar</button>
    </p>
</form>