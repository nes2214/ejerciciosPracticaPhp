<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h2>Iniciar sesión</h2>

<?php 
if (isset($_GET['error'])) {
    echo "<p style='color:red'>".$_GET['error']."</p>";
}
?>

<form action="login_process.php" method="POST">
    <label>Usuario:</label><br>
    <input type="text" name="usuario"><br><br>

    <label>Contraseña:</label><br>
    <input type="password" name="pwd"><br><br>

    <button type="submit">Entrar</button>
</form>
<p>No tienes cuenta? <a href="register.php">Registrarse</a></p>

</body>
</html>