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
        function cuotaMensual ($capital, $intereses, $plazos) {
            $interesMensual = $intereses / 12;
            $superior = $capital * $interesMensual;
            $inferior = 100 * (1 - pow((1 + $interesMensual / 100), - $plazos));
            $cuota = $superior / $inferior;

            return $cuota;
        }

        $capital = 120000; $intereses = 5; $plazos = 240;
        
        echo "Un préstamo de " . $capital . " €, al " . $intereses . "%, en " . $plazos . " meses. Tiene una cuota de " . cuotaMensual($capital, $intereses, $plazos) . " €";

    ?>
</body>
</html>