<?php

session_start();

if (!isset($_SESSION['logueado']) || $_SESSION['logueado'] === false) {
    header('location: index.php');
}

function listado() {
    $dbName = "mysql:dbname=gimnasio";
    $user = "root";
    $psw = "";
    $conexion = new PDO($dbName, $user, $psw);

    $consulta = "SELECT * FROM gim_reservas WHERE usuario_id = " . $_SESSION['id'];
    $resultado = $conexion->query($consulta);
    $reservas = $resultado->fetchAll();

    $consulta = "SELECT * FROM gim_clases";
    $resultado = $conexion->query($consulta);

    echo '<form method="post" action="">';

    foreach ($resultado as $fila) {
        echo '<label for="fecha_hora">' . $fila['fecha'] . ' ' . $fila['hora'] . '</label>';
        
        $clase = false;
        foreach ($reservas as $reserva) {
            if ($fila['clase_id'] === $reserva['clase_id']) {
                $clase = true;
                echo '<input type="radio" id="fecha_hora" name="' . $fila['clase_id'] . '" value="inactiva">';
                echo '<input type="radio" id="fecha_hora" name="' . $fila['clase_id'] . '" value="activa" checked>';
                echo '<br>';
            }
        }

        if (!$clase) {
            echo '<input type="radio" id="fecha_hora" name="' . $fila['clase_id'] . '" value="inactiva" checked>';
            echo '<input type="radio" id="fecha_hora" name="' . $fila['clase_id'] . '" value="activa">';
            echo '<br>';
        }
    }
    echo '<input type="submit" value="Reservar">';
    echo '</form>';
}

function reservar() {
    $dbName = "mysql:dbname=gimnasio";
    $user = "root";
    $psw = "";

    $conexion = new PDO($dbName, $user, $psw);

    $consulta = "DELETE FROM gim_reservas WHERE usuario_id = " . $_SESSION['id'];
    $conexion->query($consulta);

    foreach ($_POST as $key => $value) {
        if ($value === 'activa') {
            $consulta = "INSERT INTO gim_reservas (clase_id, usuario_id) VALUES ($key, " . $_SESSION['id'] . ")";
            $conexion->query($consulta);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases Gimnasio</title>
</head>

<body>
    <h1>hola <?php echo $_SESSION['usuario'] ?></h1>
    <?php

    if ($_POST) {
        reservar();
    }

    listado();
    ?>

    <a href="cerrar.php">Cerrar sesión</a>
</body>

</html>