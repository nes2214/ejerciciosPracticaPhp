<?php
if(!isset($_GET['id']) || !isset($_COOKIE['carrito'])){
    header("Location: carrito.php");
    exit();
}

$carrito = json_decode($_COOKIE['carrito'], true);
$id = $_GET['id'];

if(isset($carrito[$id])){
    unset($carrito[$id]);
}

setcookie('carrito', json_encode($carrito), time()+3600);
header("Location: carrito.php");
exit();
?>
