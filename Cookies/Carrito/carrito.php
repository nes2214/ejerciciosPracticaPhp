<?php
function obtenerProductos() {
    $productos = [];
    $archivo = fopen("productos.txt", "r");
    fgetcsv($archivo,1000,";");
    while(($data=fgetcsv($archivo,1000,";"))!==false){
        $productos[$data[0]] = [
            "nombre"=>$data[1],
            "precio"=>floatval($data[2])
        ];
    }
    fclose($archivo);
    return $productos;
}

$productos = obtenerProductos();
$carrito = isset($_COOKIE['carrito']) ? json_decode($_COOKIE['carrito'], true) : [];

if(!$carrito){
    echo "No hay productos en el carrito.";
    exit();
}

$total = 0;
echo "<h2>🛒 Carrito de compra</h2>";
echo "<table border='1' cellpadding='10'><tr><th>Producto</th><th>Cantidad</th><th>Precio</th><th>Subtotal</th><th>Eliminar</th></tr>";

foreach($carrito as $id => $cant){
    $nombre = $productos[$id]['nombre'];
    $precio = $productos[$id]['precio'];
    $subtotal = $precio * $cant;
    $total += $subtotal;

    echo "<tr>";
    echo "<td>$nombre</td>";
    echo "<td>$cant</td>";
    echo "<td>$precio €</td>";
    echo "<td>$subtotal €</td>";
    echo "<td><a href='eliminar.php?id=$id'>❌</a></td>";
    echo "</tr>";
}

echo "<tr><td colspan='3'><strong>Total</strong></td><td colspan='2'><strong>$total €</strong></td></tr>";
echo "</table><br>";
echo "<a href='index.php'>Seguir comprando</a> | <a href='vaciar.php'>Vaciar carrito</a>";

// Guardar historial en carrito.txt
$archivo = fopen("carrito.txt","a");
$linea = [];
foreach($carrito as $id => $cant){
    $linea[] = $productos[$id]['nombre'] . " x".$cant;
}
fwrite($archivo, implode(";", $linea)." | Total: $total €".PHP_EOL);
fclose($archivo);
?>
