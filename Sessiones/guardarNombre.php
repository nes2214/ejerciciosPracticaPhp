<?php
session_start();


if(isset($_POST['guardar'])){
    if(isset($_POST['name'])){
        $_SESSION['name'] = $_POST['name'];
    }
}
if(isset($_POST['btnBorrar'])){
    unset($_SESSION['name']);
    header('Location: guardarNombre.php');
    exit();
}
$name =  $_SESSION['name'] ?? ''


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Hola <?php echo $name?> </p>

    <form action="" method="post">
        <label for="">Introduce Nombre</label>
        <input type="text" name="name">

        <button name = "guardar">Guardar</button>
        <button name = "btnBorrar">Borrar Sesion</button>

        
    </form>
</body>
</html>