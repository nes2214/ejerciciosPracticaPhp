<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php?error=Debes iniciar sesión");
    exit();
}
?>

<h1>Bienvenido, <?php echo $_SESSION['usuario']; ?></h1>
<p>Correo: <?php echo $_SESSION['correo']; ?></p>

<a href="logout.php">Cerrar sesión</a>
