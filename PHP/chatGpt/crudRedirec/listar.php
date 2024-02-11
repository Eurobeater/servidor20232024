<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>body {text-align: center; margin-left: 20px;} table, tr, td, th {border: solid;}</style>
    <title>Listar</title>
</head>
<body>
    <h1>CRUD - Listar</h1>
</body>
</html>

<?php
    $dsn = "mysql:dbname=crudPildoras";
    $username = "root";
    $password = "";

    $conexion = new PDO( $dsn, $username, $password );
    $sql = 'SELECT * FROM usuarios';
    $resultado = $conexion->query($sql);           //almacenar el resultado de la consulta en la variable $resultado
    
    if ($resultado) {           //if $resultado == true
        echo "<table>\n";
        foreach ($resultado as $usuario) {              //por cada resultado, se crea $usuario, que es un array asociativo utilizando el id como clave (por eso los corchetes)
            echo "\t<tr>\n";
            echo "\t\t<td>" . $usuario['id'] . "</td>\n";
            echo "\t\t<td>" . $usuario['nombre'] . "</td>\n";
            echo "\t\t<td>" . $usuario['numero'] . "</td>\n";
            echo "\t\t<td><a href='actualizar.php?opcion=editar&id=" . $usuario['id'] . "'>Editar</a></td>\n";
            echo "\t\t<td><a href='borrar.php?opcion=delete&id=" . $usuario['id'] . "'>Borrar</a></td>\n";
            echo "\t</tr>\n";
        }
        echo "</table>\n";
        echo "<a href='crear.php?opcion=nuevo'>Crear</a>";
    } else {
        echo "No se pudieron obtener resultados de la consulta.";
    }
?>