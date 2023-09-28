<?php
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "testChatGpt";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["accion"] == "insertar") {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $sql = "INSERT INTO usuarios (nombre, email) VALUES ('$nombre', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "Registro insertado exitosamente.";
        } else {
            echo "Error al insertar registro: " . $conn->error;
        }
    } elseif ($_POST["accion"] == "actualizar") {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $sql = "UPDATE usuarios SET nombre='$nombre', email='$email' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Registro actualizado exitosamente.";
        } else {
            echo "Error al actualizar registro: " . $conn->error;
        }
    } elseif ($_POST["accion"] == "eliminar") {
        $id = $_POST["id"];
        $sql = "DELETE FROM usuarios WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Registro eliminado exitosamente.";
        } else {
            echo "Error al eliminar registro: " . $conn->error;
        }
    }
}

// Mostrar formularios para CRUD
echo '<h2>Insertar Usuario</h2>';
echo '<form method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">';
echo '<input type="hidden" name="accion" value="insertar">';
echo 'Nombre: <input type="text" name="nombre"><br>';
echo 'Email: <input type="text" name="email"><br>';
echo '<input type="submit" value="Insertar">';
echo '</form>';

echo '<h2>Actualizar Usuario</h2>';
echo '<form method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">';
echo '<input type="hidden" name="accion" value="actualizar">';
echo 'ID: <input type="text" name="id"><br>';
echo 'Nombre: <input type="text" name="nombre"><br>';
echo 'Email: <input type="text" name="email"><br>';
echo '<input type="submit" value="Actualizar">';
echo '</form>';

echo '<h2>Eliminar Usuario</h2>';
echo '<form method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">';
echo '<input type="hidden" name="accion" value="eliminar">';
echo 'ID: <input type="text" name="id"><br>';
echo '<input type="submit" value="Eliminar">';
echo '</form>';

// Mostrar lista de usuarios
echo '<h2>Lista de Usuarios</h2>';
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table border="1"><tr><th>ID</th><th>Nombre</th><th>Email</th></tr>';
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['id']}</td><td>{$row['nombre']}</td><td>{$row['email']}</td></tr>";
    }
    echo '</table>';
} else {
    echo "No se encontraron registros.";
}

$conn->close();
?>
