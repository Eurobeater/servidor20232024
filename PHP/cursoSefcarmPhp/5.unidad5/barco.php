<?php

class Barco {
    public $color;

    public function __construct($color) {
        $this->color = $color;
    }

    public function __destruct() {
        echo "destruyendo";
    }
}
    $miBarco = new Barco('Rojo');
    echo $miBarco->color; // Devuelve Rojo
    echo "<br/>";
?>