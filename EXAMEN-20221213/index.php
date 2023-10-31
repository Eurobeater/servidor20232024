<?php
if ($_POST) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $dbName = "mysql:dbname=gimnasio";
    $user = "root";
    $psw = "";

    $conexion = new PDO($dbName, $user, $psw);

    $consulta = "SELECT * FROM gim_usuarios WHERE usuario = '$usuario' AND password = '$password'";
    $resultado = $conexion->query($consulta);

    $usuario = $resultado->fetch();

    if ($usuario) {
        session_start();

        $_SESSION['id'] = $usuario['usuario_id'];
        $_SESSION['usuario'] = $usuario['usuario'];
        $_SESSION['logueado'] = true;

        header('Location: listarClases.php');
    } else {
        $error = 'El usuario o la contraseña no son correctos';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="" method="POST">
        <label for="text">Usuario</label>
        <input type="usuario" name="usuario" id="usuario"> <br><br>

        <label for="password">Password</label>
        <input type="text" name="password" id="password"> <br><br>

        <input type="submit" value="Aceptar">
        <input type="reset" value="Cancelar">
    </form>

    <?php
    if (isset($error)) {
        echo "<p>$error</p>";
    }
    ?>
</body>

</html>