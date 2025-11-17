<?php
// Leer productos desde archivo
function obtenerProductos() {
    $productos = [];
    $archivo = fopen("productos.txt", "r");
    fgetcsv($archivo, 1000, ";"); // saltar cabecera
    while(($data = fgetcsv($archivo, 1000, ";")) !== false){
        $productos[$data[0]] = [
            "nombre" => $data[1],
            "precio" => floatval($data[2])
        ];
    }
    fclose($archivo);
    return $productos;
}

$productos = obtenerProductos();

// Procesar formulario
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cantidad'])){
    $carrito = [];
    foreach($_POST['cantidad'] as $id => $cant){
        $cant = intval($cant);
        if($cant > 0 && isset($productos[$id])){
            $carrito[$id] = $cant;
        }
    }
    setcookie("carrito", json_encode($carrito), time()+3600);
    header("Location: carrito.php");
    exit();
}
?>

<h2>Selecciona productos</h2>
<form method="POST">
    <?php foreach($productos as $id => $p): ?>
        <div>
            <strong><?= $p['nombre'] ?></strong> - <?= $p['precio'] ?>€
            <input type="number" name="cantidad[<?= $id ?>]" value="0" min="0" style="width:50px">
        </div>
    <?php endforeach; ?>
    <br>
    <button type="submit">Añadir al carrito</button>
</form>

<a href="carrito.php">Ver carrito</a>
