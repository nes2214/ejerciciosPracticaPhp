<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $modo = $_POST['modo'] ?? '';
    setcookie('modo', $modo);

   
}

if ($modo == "black") {
    $bg = "#121212";
    $texto = "#FFFFFF";
    $caja = "#1E1E1E";
    $boton = "#333333";
} else {
    $bg = "#FFFFFF";
    $texto = "#000000";
    $caja = "#f2f2f2";
    $boton = "#E0E0E0";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body{
            background-color: <?= $bg ?>;
            color: <?= $texto ?>;
            font-family: Arial, sans-serif;
        }
        .caja {
            background-color: <?= $caja ?>;
            padding: 15px;
            border-radius: 8px;
            width: 300px;
            margin-bottom: 20px;
        }
        button {
            background-color: <?= $boton ?>;
            color: <?= $texto ?>;
            padding: 10px 20px;
            border: 1px solid <?= $texto ?>;
            border-radius: 5px;
            cursor: pointer;
        }
        select {
            padding: 8px;
            background-color: <?= $caja ?>;
            color: <?= $texto ?>;
            border-radius: 5px;
            border: 1px solid <?= $texto ?>;
        }

    </style>
</head>

<body>
    <h1>AA</h1>

    <form action=" " method="POST">
        <select name="modo" id="modo">
            <option value="" selected disabled>---Elije un color---</option>
            <option value="white">Modo Claro</option>
            <option value="black">Modo Oscuro</option>
        </select>
        <button type="submit">Cambiar modo</button>
    </form>
</body>
</html>