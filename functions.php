<?php
function factorial ($valor) {
    if ($valor == 0) {
        $resultado = 1;
    }else {
        $resultado = 1;
        for ($i=0; $i <=$valor ; $i++) { 
            $resultado *= $i;
        }
    }
}
?>