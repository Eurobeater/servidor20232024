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
    <?php
        if (isset ($_COOKIE["idiomaSeleccionado"])) {               //si la cookie se ha creado...
            if ($_COOKIE["idiomaSeleccionado"] == "es") {           //si el valor de la cookie es "es", redirije a spanish.php
                header("Location:spanish.php");
            }else {
                header("Location:english.php");                      //si el valor de la cookie es "en", redirije a english.php
            }
        }    
    ?>
    <h1>COOKIES - Idioma</h1>
    <a href="creaCookie.php?idioma=es">Español</a>      <!--- Pasar Idioma como parámetro a creaCookie.php, cuyo valor es 'es' --->
    <a href="creaCookie.php?idioma=en">English</a>      <!--- Pasar Idioma como parámetro a creaCookie.php, cuyo valor es 'en' --->
</body>
</html>

