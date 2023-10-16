<?php
class Coche {
    public $marca;
    public $modelo;
    public $potencia;

    public function getMarca() {
        return $this->marca;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getPotencia() {
        return $this->potencia;
    }

    public function setPotencia($potencia) {
        if (!is_numeric($potencia)) {
            throw new Exception('Valor no válido: ' . $potencia);
        }
        $this->potencia = $potencia;
    }

    public function elCocheElegidoEsMasRapido($cocheElegido)
    {
        return $cocheElegido->potencia > $this->potencia;
    }
}

function mostrarCaracteristicas($esteCoche) {
    echo 'Marca: ' . $esteCoche->getMarca() . "<br/>";
    echo 'Modelo: ' . $esteCoche->getModelo() . "<br/>";
}

$miCoche = new Coche();
$miCoche->marca = "Seat";
$miCoche->modelo = "Ibiza";
$miCoche->potencia = 100; //valor sin llamar al metodo setPotencia
$miCoche->setPotencia(120);

$tuCoche = new Coche();
$tuCoche->marca = "Opel";
$tuCoche->modelo = "Corsa";
$tuCoche->potencia = 120;

//echo "La marca de mi coche es " .$miCoche->marca;
echo "La marca de mi coche es " . $miCoche->getMarca();
echo "<br/>";

mostrarCaracteristicas($miCoche);
echo "<br/>";
mostrarCaracteristicas($tuCoche);

if ($miCoche->elCocheElegidoEsMasRapido($tuCoche)) {
    echo 'El ' . $tuCoche->marca . ' es más rápido';
} else {
    echo 'El ' . $miCoche->marca . ' es más rápido';
}
?>