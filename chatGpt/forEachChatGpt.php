<?php
$poblacion = array(
    'Madrid' => 3200000,
    'Barcelona' => 1600000,
    'Valencia' => 800000,
    'Sevilla' => 700000,
    'Zaragoza' => 600000
);

foreach ($poblacion as $ciudad => $habitantes) {
    if ($ciudad === 'Madrid') {
        echo "La población de $ciudad es $habitantes <br>";
        break;  // Terminamos el bucle una vez que encontramos Madrid
    }
}

?>