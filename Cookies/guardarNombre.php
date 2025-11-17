<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST["nombre"])){
        setcookie("nombreUsuario", $_POST["nombre"]);
        header("Location: guardarNombre.php");
        exit();
    }
}
$nombre = $_COOKIE['nombreUsuario'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hola, <?php echo $nombre; ?> </h1>
    <form action="" method="POST">
        <label>Nombre:</label><br>
        <input type="text" name="nombre"><br><br>

        <button type="submit">Guardar Nombre</button>
    </form>
</body>
</html>