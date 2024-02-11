<?php

if(isset($_POST['usuario'])) {
    if(!empty($_POST['usuario'])) {
        $usuario = $_POST['usuario'];
        echo("Nombre de usuario: " .$usuario);
        echo "<p> <p>";
    }
}

if(isset($_POST['password']) && isset($_POST['confirmarPassword']) &&
   !empty($_POST['password']) && !empty($_POST['confirmarPassword'])) {

    $password = $_POST['password'];
    $confirmarPassword = $_POST['confirmarPassword'];

    if ($password === $confirmarPassword) {
        echo "Contraseña de usuario: " . $password;
        echo "<p> </p>";
    } else {
        echo "Las contraseñas no coinciden. Por favor, inténtalo de nuevo.";
        echo "<p> </p>";
    }
}
?>
