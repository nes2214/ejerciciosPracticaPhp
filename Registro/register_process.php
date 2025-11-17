<?php
if (isset($_POST['usuario']) && isset($_POST['correo']) && isset($_POST['pwd'])) {

    function validar($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $usuario = validar($_POST['usuario']);
    $correo = validar($_POST['correo']);
    $pwd = validar($_POST['pwd']);

    // Validaciones básicas
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

    // ⭐ Validación de contraseña fuerte
if (strlen($pwd) < 8 ||
    !preg_match('/[A-Z]/', $pwd) ||       // Mayúscula
    !preg_match('/[a-z]/', $pwd) ||       // Minúscula
    !preg_match('/[0-9]/', $pwd) ||       
    !preg_match('/[^a-zA-Z0-9]/', $pwd)) 
{
    header("Location: register.php?error=La contraseña debe tener mínimo 8 caracteres, una mayúscula, una minúscula, un número y un símbolo.");
    exit();
}

    // Guardar contraseña en md5 (NO recomendado en producción)
    $pwd_hash = md5($pwd);

    $archivo = "files/users.txt";

    // Comprobar si existe el archivo y si el usuario/correo ya están registrados
    if (file_exists($archivo)) {
        $usuarios = file($archivo);

        foreach ($usuarios as $linea) {
            list($u, $c, $p) = explode(";", trim($linea));

            if ($u === $usuario) {
                header("Location: register.php?error=El usuario ya existe");
                exit();
            }

            if ($c === $correo) {
                header("Location: register.php?error=El correo ya está registrado");
                exit();
            }
        }
    }

    // Registrar usuario
    $registro = $usuario . ";" . $correo . ";" . $pwd_hash . "\n";
    file_put_contents($archivo, $registro, FILE_APPEND);

    header("Location: index.php?success=Usuario registrado con éxito");
    exit();

} else {
    header("Location: register.php");
    exit();
}
?>
