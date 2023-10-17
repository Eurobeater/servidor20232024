<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>CRUD CHATGPT</title>
    <style>body {text-align: center;} table, tr, td, th {border: solid;}</style>
</head>
<body>
    <h1>CRUD PÍLDORAS</h1>
    
</body>
</html>





<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function listarTabla() {
    $dsn = "mysql:dbname=crudPildoras";
    $username = "root";
    $password = "";

    $conexion = new PDO( $dsn, $username, $password );
    $sql = 'SELECT * FROM usuarios';
    $resultado = $conexion->query($sql);           //almacenar el resultado de la consulta en la variable $resultado
    
    if ($resultado) {           //if $resultado == true
        echo "<table>\n";
        foreach ($resultado as $usuario) {
            echo "\t<tr>\n";
            echo "\t\t<td>" . $usuario['id'] . "</td>\n";
            echo "\t\t<td>" . $usuario['nombre'] . "</td>\n";
            echo "\t\t<td>" . $usuario['numero'] . "</td>\n";
            echo "\t\t<td><a href='crud.php?opcion=editar&id=" . $usuario['id'] . "'>Editar</a></td>\n";
            echo "\t\t<td><a href='crud.php?opcion=delete&id=" . $usuario['id'] . "'>Borrar</a></td>\n";
            echo "\t</tr>\n";
        }
        echo "</table>\n";
        echo "<a href='crud.php?opcion=nuevo'>Nuevo</a>";
    } else {
        echo "No se pudieron obtener resultados de la consulta.";
    }
}
/*
function listarUsuario() {
    $dsn = "mysql:dbname=crudPildoras";
    $username = "root";
    $password = "";

    $conexion = new PDO( $dsn, $username, $password );
    $sql = 'SELECT * FROM usuarios';
    $resultado = $conexion->query($sql);           //almacenar el resultado de la consulta en la variable $resultado

    // Aquí puedes procesar los resultados si es necesario
    // Por ejemplo, puedes iterar sobre los resultados y mostrarlos
    //foreach ($resultado as $fila) {
       // echo 'ID: ' . $fila['id'] . ', Nombre: ' . $fila['nombre'] . ', Número: ' . $fila['numero'] . '<br>';
   // }
}
*/
function crear() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'crear') {
        $dsn = "mysql:host=localhost;dbname=crudPildoras";
        $username = "root";
        $password = "";

        $conexion = new PDO($dsn, $username, $password);

        if (isset($_POST['nombre']) && isset($_POST['numero'])) {
            $nombre = $_POST['nombre'];
            $numero = $_POST['numero'];

            $sql = "INSERT INTO usuarios (nombre, numero) VALUES ('$nombre', '$numero')";
            $conexion->exec($sql);

            // Redirige al usuario a la página principal después de crear un usuario. Para evitar añadir otro usuario al recargar
            header("Location: creado.php");

            exit(); // Asegura que el script se detenga aquí y no siga ejecutándose. Otra opcion seria redirigir a otro lado
        } else {
            echo "Por favor, proporcione los datos necesarios para crear un usuario.";
        }
    }
}




    ?>
   <form action="crudPildoras.php" method="post">
    <input type="hidden" name="accion" value="crear">
    <input type="text" name="nombre" placeholder="Nombre">
    <input type="text" name="numero" placeholder="Número">
    <button type="submit">Crear</button>
</form>


<?php
    


function actualizar() {
    $dsn = "mysql:dbname=crudPildoras";
    $username = "root";
    $password = "";

    $conexion = new PDO( $dsn, $username, $password );
}

function borrar() {
    $dsn = "mysql:dbname=crudPildoras";
    $username = "root";
    $password = "";

    $conexion = new PDO( $dsn, $username, $password );
}


//issets
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];
    
        if ($accion === 'crear') {
            crear();
        } elseif ($accion === 'actualizar') {
            // Lógica para actualizar
            actualizar();
        } elseif ($accion === 'borrar') {
            // Lógica para borrar
            borrar();
        } else {
            echo "Acción no válida.";
        }
    } else {
        echo "No se proporcionó una acción.";
    }
}

listarTabla();
//listarUsuario();
crear();
//actualizar();
//borrar();

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>


<form action="crudPildoras.php" method="post">
        <input type="hidden" name="accion" value="crear">
        <button type="submit">Crear</button>
    </form>

    <form action="crudPildoras.php" method="post">
        <input type="hidden" name="accion" value="actualizar">
        <button type="submit">Actualizar</button>
    </form>

    <form action="crudPildoras.php" method="post">
        <input type="hidden" name="accion" value="borrar">
        <button type="submit">Borrar</button>
    </form>


