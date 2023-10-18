<?php
function inverso($x) {
    if ($x  == 0 ) {
        throw new Exception('División por cero.');
    }
	if ( $x == null ) {
        throw new Exception('Parametro esperado.');
    }
    return 1/$x;
}

try {
    echo inverso(5) . "\n";
    echo inverso(0) . "\n";
}catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}	
try{
    echo inverso(7) . "\n";
    echo inverso() . "\n";
} 
catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}