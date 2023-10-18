<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Crear</title>
    <style>body {text-align: center; margin-left: 20px;} table, tr, td, th {border: solid;}</style>
</head>
<body>
    <h1>CRUD - Crear</h1>
    <form action="crear.php" method="post">
        <input type="hidden" name="accion" value="crear">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="numero" placeholder="Número">
        <button type="submit">Crear</button>
    </form>

    <br>
    <a href="listar.php">Volver a Listar Usuarios</a>
</body>
</html>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'crear') {
    $dsn = "mysql:host=localhost;dbname=crudPildoras";
    $username = "root";
    $password = "";

    $conexion = new PDO($dsn, $username, $password);

    // Verifica si el nombre y el número están presentes y no están vacíos
    if (isset($_POST['nombre']) && isset($_POST['numero']) && !empty($_POST['nombre']) && !empty($_POST['numero'])) {
        $nombre = $_POST['nombre'];
        $numero = $_POST['numero'];

        $sql = "INSERT INTO usuarios (nombre, numero) VALUES ('$nombre', '$numero')";
        $conexion->exec($sql);

        // Redirige al usuario a la página listar después de crear un usuario. Para evitar añadir otro usuario al recargar
        header("Location: listar.php");

        exit(); // Asegura que el script se detenga aquí y no siga ejecutándose. Otra opción sería redirigir a otro lugar
    } else {
        echo "Por favor, proporcione los datos necesarios para crear un usuario.";
    }
}
?>
