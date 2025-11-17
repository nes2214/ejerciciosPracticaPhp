<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {
   

    if(isset($_POST['nombre'], $_POST['telefono'], $_POST['correo'])) {
        $nombre = trim($_POST['nombre']);
        $telefono = trim($_POST['telefono']);
        $correo = trim($_POST['correo']);

}   
        if(empty($nombre) || empty($telefono) || empty($correo)) {
            header("Location: index.php?error=Todos los campos son obligatorios");
            exit();
        }

        $archivo = "files/agenda.txt";
        $registro = $nombre . ";" . $telefono . ";" . $correo . "\n";
        file_put_contents($archivo, $registro, FILE_APPEND);
        echo "Contacto guardado con éxito.";
        exit();

    
}


?>