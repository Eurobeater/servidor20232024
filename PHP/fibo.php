<?php
$f0 = 1;
$f1 = 1;
for ($i=0; $i<=10 ; $i++) { 
    if ($i == 1 || $i == 0) {
        $factorial = 1;
    }else {
        $factorial = $f0 + $f1;
        $f0 = $f1;
        $f1 = $factorial;
    }
    echo $i ." ". $factorial. "<br>";
}
?>