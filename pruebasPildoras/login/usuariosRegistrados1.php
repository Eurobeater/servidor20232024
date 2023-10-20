<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>body {text-align: center; margin-left: 20px;} table, tr, td, th {border: solid;}</style>
    <title>Usuarios registrados</title>
</head>
<body>
    <?php
        session_start();            //se reanuda la sesión creada previamente en compruebaLogin.php
        if (!isset($_SESSION['usuario'])) {      //si no existe la variable supeglobal $SESSION cuyo nombre es 'usuario', redirige a login. para evitar entrar aqui sin iniciar sesión
            header("Location:login.php");
        }else {
            
        }
    ?>

    <h1>LOGIN - USUARIOS REGISTRADOS</h1>
    <h2>Bienvenidos Usuarios</h2>
    <?php
        echo "Usuario: " .$_SESSION['usuario']. "<br><br>";          //usamos la variable superglobal $SESSION con parametro 'usuario' para mostrar el nombre del usuario que ha iniciado sesión y almacenado en dicha variable
    ?>
    <p>Esto es información solo para usuarios registrados</p>
    
    <table>
        <tr>
            <td colspan="3">Zona usuarios registrados</td>
        </tr>
        <tr>
            <td><a href="usuariosRegistrados1.php">Página 1</a></td>
            <td><a href="usuariosRegistrados2.php">Página 2 </a></td>
            <td><a href="usuariosRegistrados3.php">Página 3</a></td>

        </tr>
    </table>
    
</body>
</html>

<?php



?>