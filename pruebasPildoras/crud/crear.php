<?php
function crear() {
    $dsn = "mysql:host=localhost;dbname=crudPildoras;charset=utf8";
    $username = "root";
    $password = "";


    $conexion = new PDO($dsn, $username, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'crear') {
            if (isset($_POST['nombre']) && isset($_POST['numero'])) {
                $nombre = $_POST['nombre'];
                $numero = $_POST['numero'];

                // Realiza la lógica para crear un nuevo usuario usando $nombre y $numero
                $sql = "INSERT INTO usuarios (nombre, numero) VALUES ('$nombre', '$numero')";
                $conexion->exec($sql);

                echo "Usuario creado: Nombre=$nombre, Número=$numero;";
                //header("Location: creado.php");  // Redirige a la página principal
            } else {
                echo "Por favor, proporcione los datos necesarios para crear un usuario.";
            }
        }

    // Redirige a la página de éxito
    header("Location: creado.php");
    exit();  // Asegura que el script termine después de la redirección
}

// Llama a la función para crear un usuario
crear();
?>
