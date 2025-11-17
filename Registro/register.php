<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>

<h2>Registro de usuario</h2>

<form action="register_process.php" method="POST">
    <label>Usuario:</label><br>
    <input type="text" name="usuario"><br><br>

    <label>Correo:</label><br>
    <input type="email" name="correo"><br><br>

    <label>Contraseña:</label><br>
    <input type="password" name="pwd"><br><br>

    <button type="submit">Registrarse</button>
</form>

</body>
</html>
