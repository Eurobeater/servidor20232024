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
        $ciudades = array ("Murcia", "Almería", "Alicante");

        foreach ($ciudades as $indice => $valor) {                              //asigna en cada cada iteracion el indice del elemento actual a la variable indice, ademas de asignar el valor del elemento actual a la variable 'balor' 
            echo ("El índice " .$indice. " tiene el valor " .$valor. "<br/>");
        }
    ?>
</body>
</html>