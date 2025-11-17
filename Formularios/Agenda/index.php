<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Agenda</h1>

    <form action="agregar_process.php" method="POST">
        <label>Nombre:</label><br>
        <input type="text" name="nombre"><br><br>

        <label>Teléfono:</label><br>
        <input type="text" name="telefono"><br><br>

        <label>Correo:</label><br>
        <input type="email" name="correo"><br><br>

        <button type="submit">Agregar Contacto</button>

    </form>
       <form action="borrar_process.php" method="POST">
        <label>Nombre:</label><br>
        <input type="text" name="nombreBorrar">


        <button name="btnBorrar">Borrar contacto</button>
    </form>
    <a href="contactos.php">Ver contactos</a>
</body>
</html>