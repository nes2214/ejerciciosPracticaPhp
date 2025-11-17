<?php
session_start();


if(isset($_POST['btnReset'])){
    unset($_SESSION['visitas']);
    header("Location: ContadorVisitas.php");
    exit();
}
if(!isset($_SESSION['visitas'])){
    $_SESSION['visitas'] = 1;
}else{
    $_SESSION['visitas']++;
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
    <p>Visitas <?php echo $_SESSION['visitas']  ?> </p>

    <form action="" method="post">
        <button id="btnReset" name="btnReset">Reset Visitas</button>
    </form>
</body>
</html>