<?php
if(isset($_POST["btnSalir"])){
    session_destroy();
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista admin</title>
</head>
<body>
    <h1>Se encuentra en la vista admin</h1>
    <form action="index.php" method="post">
            <button type="submit" name="btnSalir">Salir</button>
    </form>
</body>
</html>