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
        $numeroAleatorio = rand(1, 100);    //se almacena en una variable un numero aleatorio entre 1 y 100
        echo $numeroAleatorio . "<br/>";
        $fecha = date("d/m/y");     //devuelve la fecha actual
        echo $fecha . "<br/>";
        echo pi();  
    ?>
</body>
</html>