<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>CRUD PÍLDORAS</title>
    <style>body {text-align: center;} table, tr, td, th {border: solid;}</style>
</head>
<body>
    <h1>CRUD PÍLDORAS</h1>
    
</body>
</html>




<?php
function listarTabla() {
    $dsn = "mysql:dbname=crudPildoras";
    $username = "root";
    $password = "";

    $conexion = new PDO( $dsn, $username, $password );
    $sql = 'SELECT * FROM personas';
    $resultado = $conexion->query($sql);           //almacenar el resultado de la consulta en la variable $resultado
    
    if ($resultado) {           //if $resultado == true
        echo "<table>\n";
        foreach ($resultado as $usuario) {
            echo "\t<tr>\n";
            echo "\t\t<td>" . $usuario['codigo'] . "</td>\n";
            echo "\t\t<td>" . $usuario['nombre'] . "</td>\n";
            echo "\t\t<td>" . $usuario['apellidos'] . "</td>\n";
            echo "\t\t<td><a href='crud.php?opcion=editar&codigo=" . $usuario['codigo'] . "'>Editar</a></td>\n";
            echo "\t\t<td><a href='crud.php?opcion=delete&codigo=" . $usuario['codigo'] . "'>Borrar</a></td>\n";
            echo "\t</tr>\n";
        }
        echo "</table>\n";
        echo "<a href='crud.php?opcion=nuevo'>Nuevo</a>";
    } else {
        echo "No se pudieron obtener resultados de la consulta.";
    }

/*
    foreach ( $resultado as $usuario ) {
        echo "\t<tr>\n";
        echo "\t\t<td>". $usuario[ 'codigo' ]. "</td>\n";
        echo "\t\t<td>". $usuario[ 'nombre' ]. "</td>\n";
        echo "\t\t<td>". $usuario[ 'apellidos' ]. "</td>\n";
        echo "\t\t<td>". "<a href='crud.php?opcion=editar&codigo=" . $usuario[ 'codigo' ]. "'>Editar</a>" ."</td>\n";
        echo "\t\t<td>". "<a href='crud.php?opcion=delete&codigo=" . $usuario[ 'codigo' ]. "'>Borrar</a>" ."</td>\n";
        echo "\t</tr>\n";
    }
    echo "</table>\n";
	echo "<a href='crud.php?opcion=nuevo'>Nuevo</a>";
*/


    
    
}

function listarUsuario() {
    $dsn = "mysql:dbname=crudPildoras";
    $username = "root";
    $password = "";

    $conexion = new PDO( $dsn, $username, $password );
    $sql = 'SELECT * FROM personas';
    $resultado = $conexion->query($sql);           //almacenar el resultado de la consulta en la variable $resultado

    // Aquí puedes procesar los resultados si es necesario
    // Por ejemplo, puedes iterar sobre los resultados y mostrarlos
    //foreach ($resultado as $fila) {
       // echo 'ID: ' . $fila['id'] . ', Nombre: ' . $fila['nombre'] . ', Número: ' . $fila['numero'] . '<br>';
   // }
}

function crear() {
    $dsn = "mysql:dbname=crudPildoras";
    $username = "root";
    $password = "";

    $conexion = new PDO( $dsn, $username, $password );
    $sql = "INSERT INTO usuarios VALUES";
}

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

listarTabla();
listarUsuario();
crear();
actualizar();
borrar();


?>


