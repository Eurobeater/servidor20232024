<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeNEoa7Rxnatzjc9vfiV0u7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <style>body {text-align: center; margin-left: 20px;} table, tr, td, th {border: solid;}</style>
    <title>Cookies</title>
</head>
<body>
    <?php
    $autenticado = false;

    $dsn = "mysql:dbname=sesionesPildoras";
    $username = "root";
    $password = "";

    $conexion = new PDO($dsn, $username, $password);
    $sql = 'SELECT * FROM usuarios WHERE usuarios = :login AND password = :password';
    $resultado = $conexion->prepare($sql);

    if (isset($_POST['login']) && isset($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $resultado->bindParam(':login', $login);
        $resultado->bindParam(':password', $password);

        $resultado->execute();
        $numeroRegistro = $resultado->rowCount();

        if ($numeroRegistro != 0) {
            $autenticado = true;                                                        //si el usuario se ha autenticado

            if (isset($_POST['recordar'])) {                                            //si se ha utilizado la casilla de recordar usuario
                setcookie("nombreUsuario", $_POST['login'], time() + 86400);            //guardar en una cookie el nombre del usuario, pasado por el metodo POST
            }
        }
    }
    ?>

    <?php
    if ($autenticado == false) {                                         //si el login no ha tenido exito
        if (!isset($_COOKIE["nombreUsuario"])) {                         //si la cookie no se ha creado
            include("formulario.html");                                  //se muestra el formulario de formulario.html
        }                                                                //en resumen. los que no se ha autenticado muestra un formulario. si vuelven con la cookie creada (recordar usuario), no genera formulario
    }

    if ($autenticado || isset($_COOKIE["nombreUsuario"])) {              //si $autenticado es true, el usuario ha iniciado sesión con éxito. si la cookie "nombreUsuario" está configurada, el usuario marcó la casilla "Recordar"
        echo "Sesión iniciada";
    }

    ?>
</body>
</html>
