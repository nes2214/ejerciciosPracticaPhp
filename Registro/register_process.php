<?php
session_start();

if (isset($_POST['usuario']) && isset($_POST['correo']) && isset($_POST['pwd'])) {

    function validar($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $usuario = validar($_POST['usuario']);
    $correo = validar($_POST['correo']);
    $pwd = validar($_POST['pwd']);

    if (empty($usuario)) {
        header("Location: register.php?error=El usuario es requerido");
        exit();
    }
    if (empty($correo)) {
        header("Location: register.php?error=El correo es requerido");
        exit();
    }
    if (empty($pwd)) {
        header("Location: register.php?error=La clave es requerida");
        exit();
    }

    // Encriptar contraseña
    $clave = md5($pwd);

    // Ruta del archivo donde se guardan los registros
    $archivo = "files/users.txt";

    // Verificar que el usuario no exista
    if (file_exists($archivo)) {
        $usuarios = file($archivo);
        foreach ($usuarios as $linea) {
            list($u, $c, $p) = explode(";", trim($linea));
            if ($u == $usuario) {
                header("Location: register.php?error=El usuario ya existe");
                exit();
            }
            if ($c == $correo) {
                header("Location: register.php?error=El correo ya está registrado");
                exit();
            }
        }
    }

    // Guardar usuario
    $registro = $usuario . ";" . $correo . ";" . $clave . "\n";
    file_put_contents($archivo, $registro, FILE_APPEND);

    header("Location: index.php?success=Usuario registrado con éxito");
    exit();

} else {
    header("Location: register.php");
    exit();
}
?>
