<?php
session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}
$productos = [
    ["id" => 1, "nombre" => "Camiseta", "precio" => 19.99],
    ["id" => 2, "nombre" => "Pantalón", "precio" => 29.99],
    ["id" => 3, "nombre" => "Sudadera", "precio" => 39.99],
    ["id" => 4, "nombre" => "Zapatillas", "precio" => 59.99],
    ["id" => 5, "nombre" => "Gorra", "precio" => 9.99]
];

// Recoger los IDs que hay guardados en la sesión
$idsCarrito = $_SESSION['carrito'];
$ProdsCarrito = [];
$precioTotal = 0.0;
foreach($idsCarrito as $id){
    foreach($productos as $p){
        if($p['id'] == $id){
            $ProdsCarrito[] = $p;
            $precioTotal += $p['precio'];
        }
    }
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
    <h1>Carrito</h1>
    <?php foreach($ProdsCarrito as $p){ ?>
        <p> <strong><?php echo $p["nombre"]; ?></strong>  -  <?php echo $p["precio"]; ?></p>
       

    <?php } ?>
    <p> <strong>Precio Total:</strong> <?php echo $precioTotal ?></p>
</body>
</html>