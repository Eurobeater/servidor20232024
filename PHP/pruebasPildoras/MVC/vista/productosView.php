<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>body {text-align: center; margin-left: 20px;} table, tr, td, th {border: solid;}</style>
    <title>MVC</title>
</head>
<body>
    <h1>MVC - Productos View</h1>
    <table class="table">
        <tr>
            <td>Nombre del artículo</td>
        </tr>
        <?php
            //Archivo para gestionar las vistas por parte del usuario
            foreach ($matrizProductos as $registro => $value) {             //recorrer lo que hay almacenado en el array matriz, de productosControlador
            echo "<tr><td>". $registro["Nombre artículo"]. "</td></tr>";
            }
        ?>
    </table>
</body>
</html>

