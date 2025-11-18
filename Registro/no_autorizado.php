<?php
session_start();
$rol = $_SESSION['rol'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>No puedes acceder a esta página ya que tu rol es <strong><?php echo $rol ?></strong></p>
</body>
</html>