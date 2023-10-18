<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>body {text-align: center; margin-left: 20px;} table, tr, td, th {border: solid;}</style>
    <title>Borrar</title>
</head>
<body>
    <h1>CRUD - Borrar</h1>
    
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $dsn = "mysql:host=localhost;dbname=crudPildoras";
    $username = "root";
    $password = "";

    $conexion = new PDO($dsn, $username, $password);

    $id = $_GET['id'];

    $sql = "DELETE FROM usuarios WHERE id=$id";
    $conexion->exec($sql);

    // Redirige al usuario a la página principal después de borrar el usuario
    header("Location: listar.php");
    exit();
} else {
    echo "Solicitud no válida.";
}
?>
