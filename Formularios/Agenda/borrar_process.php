<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['nombreBorrar'])) {

        $nombreBorrar = trim($_POST['nombreBorrar']);

        if (empty($nombreBorrar)) {
            header("Location: index.php?error=El campo nombre es obligatorio");
            exit();
        }

        $file = "files/agenda.txt";

        if (!file_exists($file)) {
            header("Location: index.php?error=No hay contactos registrados");
            exit();
        }

        // Leer archivo completo
        $usuarios = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $encontrado = false;
        $nuevos = [];

        foreach ($usuarios as $linea) {
            list($u, $t, $c) = explode(";", $linea);

            if ($u === $nombreBorrar) {
                $encontrado = true; // Lo marcamos para borrar
            } else {
                $nuevos[] = $linea; // Guardamos los que NO se borran
            }
        }

        if (!$encontrado) {
            header("Location: index.php?error=El contacto no existe");
            exit();
        }

        // Reescribir archivo sin el contacto borrado
        file_put_contents($file, implode("\n", $nuevos) . "\n");

        header("Location: index.php?success=Contacto eliminado con éxito");
        exit();
    }
}

?>
