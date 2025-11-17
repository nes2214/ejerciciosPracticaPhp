<?php
session_start();
$productos = [
    ["id" => 1, "nombre" => "Camiseta", "precio" => 19.99],

    ["id" => 2, "nombre" => "Pantalón", "precio" => 29.99],

    ["id" => 3, "nombre" => "Sudadera", "precio" => 39.99],

    ["id" => 4, "nombre" => "Zapatillas", "precio" => 59.99],

    ["id" => 5, "nombre" => "Gorra", "precio" => 9.99]
];

if(isset($_POST['btnAñadir'])){

    if(isset($_POST['productos'])){
        
        // Guardamos la lista de IDs seleccionados
        $_SESSION['carrito'] = $_POST['productos'];

    }

    header("Location: carrito.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <?php foreach($productos as $p){?>
            <input type="checkbox" name="productos[]" value="<?= $p['id'] ?>">
            <?= $p['nombre'] ?> - <?= $p['precio'] ?>€ <br>
        <?php } ?>
        <button name="btnAñadir">Añadir al carrito</button>
        
    </form>
</body>
</html>