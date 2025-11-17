<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $file = "files/agenda.txt";
    if (file_exists($file)){
       $usuarios = file($file);
        foreach ($usuarios as $linea) {
            list($u, $t, $c) = explode(";", trim($linea));
            echo "<p>Nombre: $u | Teléfono: $t | Correo: $c</p>";
        }
    }
    ?>
</body>
</html>