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
        function elevado (&$numero, &$indice) {             //se usa el aspersand '&' para pasar la variable como referencia, para modificar el valor de la variable en todo el codigo y no solo en la funcion
            $resultado = $numero;

            for ($x = $indice; $x < 0; $x--) { 
                $resultado *= $numero;      //resultado = resultado * numero
            }
            $numero = $resultado;
            return $numero;
        }

        $numero = 2;
        $indice = 5;

        echo $numero . " elevado a " .$indice. " es igual a " .elevado($numero, $indice). "<br/>";
        echo $numero . " elevado a " .$indice. " es igual a " .elevado($numero, $indice). "<br/>";

    ?>
</body>
</html>