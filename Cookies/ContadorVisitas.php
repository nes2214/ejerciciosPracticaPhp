<?php

// Reiniciar contador si se pulsa el botón
if (isset($_GET["btnReiniciar"])) {
    setcookie("visitas", "", time() - 3600); // eliminar cookie
    header("Location: ContadorVisitas.php");
    exit();
}

// Si NO existe la cookie, se crea con valor 1
if (!isset($_COOKIE["visitas"])) {
    setcookie("visitas", 1, time() + 3600);
    $contador = 1;
} else {
    // Si existe, se incrementa
    $contador = $_COOKIE["visitas"] + 1;
    setcookie("visitas", $contador, time() + 3600);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador</title>
</head>
<body>
    <h1>Hola</h1>
    <p>Contador de visitas: <strong><?php echo $contador; ?></strong></p>

    <form method="GET">
        <button name="btnReiniciar">Reiniciar visitas</button>
    </form>
</body>
</html>
