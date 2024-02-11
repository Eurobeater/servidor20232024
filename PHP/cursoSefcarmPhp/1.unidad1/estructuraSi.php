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
        $a=20;
        $b=30;
        $c=40;

        $e="Enero";
        $f="Febrero";
        $m="Marzo";
        $mesActual ="Febrero";

        if ($a < $b) {
            echo "El valor de a es menor que el valor b";
        }

        echo "<br/>";

        if ($c < $a) {
            echo "El valor de c es menor que el de a";

        }else {
            echo "El valor de c no es menor que el de a";
        }

        echo "<br/>";

        if ($mesActual == $e) {
            echo "Estamos en el primer mes del año";
        }else if ($mesActual == $f) {
            echo "Estamos en el segundo mes del año";
        } else {
            echo "Estamos en el tercer mes del año";
        }
    ?>
</body>
</html>