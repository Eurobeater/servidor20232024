

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>body {text-align: center; margin-left: 20px;} table, tr, td, th {border: solid;}</style>
    <title>Cookies</title>
</head>
<body>
    <h1>COOKIES - LEER COOKIE 1</h1>
    <?php
        if (isset($_COOKIE["prueba"])) {
            echo $_COOKIE["prueba"];      //leer una cookie. la lee en el caso de que esté guardada en el disco duro. (se ha creado en cookie1.php). si se cierra el navegador, se borra la cookie porque no se ha especificado la duración de esta
        }else {
            echo "La cookie no se ha creado";
        }
    ?>
</body>
</html>

