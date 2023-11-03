<?php

session_start();

if (!isset($_SESSION['logueado']) || $_SESSION['logueado'] === false) {
	header('location: index.php');
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
    
    function listado()
    {
        $dbName = "mysql:dbname=gimnasio";
        $user = "root";
        $psw = "";
        $conexion = new PDO($dbName, $user, $psw);

        $consulta = "SELECT * FROM gim_clases";
        $resultado = $conexion->query($consulta);


        echo "<table>";
	    echo "<tr>";
	    echo "<th>Fecha</th>";
	    echo "<th>Hora</th>";
	    echo "<th></th>";
	    echo "<th></th>";
	    echo "</tr>";

        foreach ($resultado as $fila) {
            /*
            echo $fila['fecha'];
            echo " ";
            echo $fila['hora'];
            echo " ";
            echo "<br>";
            */
            echo "<tr>";
		    echo "<td>" .  $fila['fecha'] . "</td>";
		    echo "<td>" .  $fila['hora'] . "</td>";
            echo "<td><a href='listarClases.php?opcion=reserva&clase_id=" . $fila['clase_id'] . "'>Reservar</a></td>";
            echo "<td><a href='listarClases.php?opcion=eliminar&clase_id=" . $fila['clase_id'] . "'>Eliminar</a></td>";
            echo "</tr>";
            /*
            echo "<td><a href='privada.php?opcion=editar&codigo=" . $fila['codigo'] . "'>Editar</a></td>";
            echo "<td><a href='privada.php?opcion=eliminar&codigo=" . $fila['codigo'] . "'>Eliminar</a></td>";
            echo "</tr>";
            }
            echo "</table>";
            */
        }
        
        echo "</table>";
        echo "<a href='listarClases.php?opcion=asistentes'>Ver asistentes</a>";
    }

    function reservar() {
        $dbName = "mysql:dbname=gimnasio";
        $user = "root";
        $psw = "";
    
        $conexion = new PDO($dbName, $user, $psw);

        $consulta = "INSERT INTO gim_reservas (clase_id, usuario_id) VALUES ('" . $_POST['clase_id'] . "', '" . $_POST['usuario_id'] . "')";
	    $conexion->query($consulta);


        echo "Reserva realizada correctamente";
        echo "<br>";
        echo "<a href='index.php'>Volver</a>";
        
    }

    function eliminar($codigo) {
        
        $dbName = "mysql:dbname=gimnasio";
        $user = "root";
        $psw = "";
    
        $conexion = new PDO($dbName, $user, $psw);
    
        $consulta = "DELETE FROM gim_reservas WHERE codigo = " . $codigo;
        $conexion->query($consulta);
    
        echo "Reserva eliminada correctamente";
        echo "<br>";
        echo "<a href='index.php'>Volver</a>";
    }
    
    function asistentes()
    {
        $dbName = "mysql:dbname=gimnasio";
        $user = "root";
        $psw = "";
        $conexion = new PDO($dbName, $user, $psw);

        $consulta = "SELECT usuario FROM gim_usuarios";
        $resultado = $conexion->query($consulta);


        echo "<table>";
	    echo "<tr>";
	    echo "<th>Asistentes</th>";
	    echo "</tr>";

        foreach ($resultado as $fila) {
            echo "<tr>";
		    echo "<td>" .  $fila['usuario'] . "</td>";
            echo "</tr>";
        
        }
        
        echo "</table>";
    }





	if (!isset($_REQUEST["opcion"])) {
		listado();
	} else if ($_REQUEST["opcion"] === "reserva") {
		reservar();
    } else if ($_REQUEST["opcion"] === "asistentes") {
        asistentes();
    }
    /*else if ($_REQUEST["opcion"] === "insertar") {
		validarForm('insertar');
	} else if ($_REQUEST["opcion"] === "editar") {
		$persona = select($_GET['codigo']);
		formularioEditar($persona);
	} else if ($_REQUEST["opcion"] === "actualizar") {
		validarForm('editar');
	} else if ($_REQUEST["opcion"] === "eliminar") {
		eliminar($_GET['codigo']);
	}*/
	?>

	<a href="cerrar.php">Cerrar sesión</a>
    <input type="hidden" name="opcion" value="insertar">

    <?php
    echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';
    ?>
</body>

</html>