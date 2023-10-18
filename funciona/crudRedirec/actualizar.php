<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Actualizar</title>
    <style>body {text-align: center; margin-left: 20px;} table, tr, td, th {border: solid;}</style>
</head>
<body>
    <h1>CRUD - Actualizar</h1>
    <form action="actualizar.php" method="post">
        <input type="hidden" name="accion" value="actualizar">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">  <!---  se recoje la ID enviada desde listar.php  !-->
        <input type="text" name="nombre" placeholder="Nuevo Nombre">
        <input type="text" name="numero" placeholder="Nuevo Número">
        <button type="submit">Actualizar</button>
    </form>

    <br>
    <a href="listar.php">Volver a Listar Usuarios</a>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'actualizar') {
    $dsn = "mysql:host=localhost;dbname=crudPildoras";
    $username = "root";
    $password = "";

    $conexion = new PDO($dsn, $username, $password);

    $id = $_POST['id'];      
    $nombre = $_POST['nombre'];
    $numero = $_POST['numero'];                                          //el valor del ID se obtiene de la URL usando $_GET['id'] (en el input hidden de name id)
    //$nombre = isset($_POST['nombre']); ? $_POST['nombre'] : '';       el operador ternario sobra. para que en caso de que esten vacíos, asignar un valor predeterminado
    //$numero = isset($_POST['numero']); ? $_POST['numero'] : '';
   
    if (!empty($nombre) && !empty($numero)) {
        $sql = "UPDATE usuarios SET nombre='$nombre', numero='$numero' WHERE id=$id";
        $conexion->exec($sql);

        // Redirige al usuario a la página principal después de actualizar el usuario
        header("Location: listar.php");
        exit();
    } else {
        echo "Por favor, proporcione datos válidos para actualizar el usuario.";
    }
} else {
    echo "Acción no válida.";
}
?>

