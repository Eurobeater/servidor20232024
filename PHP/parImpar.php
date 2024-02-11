<?php
for ($i = 1; $i <= 10; $i++) {
    if ($i % 2 == 0) {
        echo $i . " es par <br>";
    } else {
        echo $i . " es impar <br>";
    }

    $esPrimo = true;

    for ($j = 2; $j < $i; $j++) {
        if ($i % $j == 0) {
            $esPrimo = false;
            break;
        }
    }

    if ($esPrimo && $i > 1) {  // Solo imprimir números primos mayores que 1
        echo $i . " es primo <br><br>";
    }
}
?>