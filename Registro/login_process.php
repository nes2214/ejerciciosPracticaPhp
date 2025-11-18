<?php
session_start();

if (isset($_POST['usuario']) && isset($_POST['pwd'])) {

    $usuario = trim($_POST['usuario']);
    $pwd = md5(trim($_POST['pwd']));

    if (empty($usuario) || empty($_POST['pwd'])) {
        header("Location: login.php?error=Todos los campos son obligatorios");
        exit();
    }

    $archivo = "files/users.txt";

    if (!file_exists($archivo)) {
        header("Location: login.php?error=No hay usuarios registrados");
        exit();
    }

    
    $fh = fopen($archivo, "r");

    $userFound = false;

    while (($linea = fgets($fh)) !== false) {

        $linea = trim($linea);
        if ($linea === "") continue; // evita líneas vacías

        list($u, $c, $p, $r) = explode(";", trim($linea));


        if ($usuario === $u) {
            $userFound = true;

            if ($pwd === $p) {

                $_SESSION['usuario'] = $u;
                $_SESSION['correo'] = $c;
                $_SESSION['rol'] = $r;
                fclose($fh);
                header("Location: home.php");
                exit();
            } else {
                fclose($fh);
                header("Location: login.php?error=Contraseña incorrecta");
                exit();
            }
        }
    }

    fclose($fh);

    if (!$userFound) {
        header("Location: login.php?error=El usuario no existe");
        exit();
    }

} else {
    header("Location: login.php?error=Error en el formulario");
    exit();
}
?>
