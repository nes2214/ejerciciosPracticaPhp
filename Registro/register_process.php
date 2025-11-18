<?php

if (isset($_POST['usuario']) && isset($_POST['correo']) && isset($_POST['pwd'])) {
    
    function validar($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $rol = validar($_POST['rol']);

    

    $usuario = validar($_POST['usuario']);
    $correo = validar($_POST['correo']);
    $pwd = validar($_POST['pwd']);

    // Validaciones básicas
    if (empty($rol)) {
        header("Location: register.php?error=Debes elegir un rol");
        exit();
    }
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

    
    if (
        strlen($pwd) < 8 ||
        !preg_match('/[A-Z]/', $pwd) ||
        !preg_match('/[a-z]/', $pwd) ||
        !preg_match('/[0-9]/', $pwd) ||
        !preg_match('/[^a-zA-Z0-9]/', $pwd)
    ) {
        header("Location: register.php?error=La contraseña debe tener mínimo 8 caracteres, una mayúscula, una minúscula, un número y un símbolo.");
        exit();
    }

    // Convertir contraseña a hash
    $pwd_hash = md5($pwd);

    $archivo = "files/users.txt";



    if (file_exists($archivo)) {
        $fh = fopen($archivo, "r");

        while (($linea = fgets($fh)) !== false) {
            $linea = trim($linea);

            if ($linea === "") continue;

            list($u, $c, $p) = explode(";", $linea);

            if ($u === $usuario) {
                fclose($fh);
                header("Location: register.php?error=El usuario ya existe");
                exit();
            }

            if ($c === $correo) {
                fclose($fh);
                header("Location: register.php?error=El correo ya está registrado");
                exit();
            }
        }

        fclose($fh);
    }


    $fh = fopen($archivo, "a");
    fwrite($fh, $usuario . ";" . $correo . ";" . $pwd_hash . ";" . $rol . "\n");
    fclose($fh);

    header("Location: index.php?success=Usuario registrado con éxito");
    exit();

} else {
    header("Location: register.php?error=Formulario inválido");
    exit();
}
?>
