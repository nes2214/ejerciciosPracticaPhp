<?php
// Comprovar si un valor existe
filter_has_var(INPUT_GET, "nombre");
filter_has_var(INPUT_POST, "email");
filter_has_var(INPUT_COOKIE, "id");


//Obtener y validar/sanitizar un valor
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$edad = filter_input(INPUT_POST, "edad", FILTER_VALIDATE_INT);
$nombre = filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_STRING); //Elimina tags HTML
$nombre = filter_input(
    INPUT_POST,
    "nombre",
    FILTER_VALIDATE_REGEXP,
    [
        "options" => ["regexp" => "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,30}$/"]
    ]
);

?>