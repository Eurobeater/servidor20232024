<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function factorial ($numero) {
            if ($numero == 1) {
                return $numero;
            }else {
                return $numero * factorial($numero - 1);      //las funciones recursivas se llaman asi mismas. en esta linea llama a la propia funcion factorial
            }
        }
        echo "El factorial de 7 es " .factorial(7). "<br/>"
    ?>
</body>
</html>