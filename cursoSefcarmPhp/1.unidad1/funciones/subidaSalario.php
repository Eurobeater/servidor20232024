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
        function nuevoSalario ($salarioBase, $porcentajeIncremento) {
            $resultado = $salarioBase + $porcentajeIncremento*$salarioBase;
            return $resultado;
        }

        $salBase = 1000; $porIncremento = 0.05;

        $nuevoSal = nuevoSalario($salBase, $porIncremento);

        echo "Nuevo salario: " .$nuevoSal;
    ?>
</body>
</html>