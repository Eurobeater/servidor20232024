<?php
class Moto {
    const ruedas = 2;
    public $color = 'Negro';
    public $marca = 'Suzuki';

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }
}

class MotoDeLujo extends Moto {
    // La función displayColor devolverá negro, ya que hereda de la clase madre
    public function displayColor(){
        return $this->color;
    }
 
    // La función displayMarca devolverá Suzuki, ya que hereda el valor
    public function displayMarca(){
        return $this->marca;
   }

   protected $extras;
        public function setExtras($extras){
            $this->extras = $extras;
       }

       public function getExtras(){
           return $this->extras;
       }

       public function imprimirCaracteristicas(){
        echo 'Color: '. $this->color;
        echo '<hr/>';
        echo 'Extras: ' . $this->extras;
    }
}

    $miMoto = new MotoDeLujo();
    $miMoto->setColor('Verde');
    $miMoto->setExtras('Casco');

    $miMoto->imprimirCaracteristicas();

    echo "<br/>";
    // Obtener el valor mediante el nombre de la clase:
    echo Moto::ruedas ."<br/>";                                //dos puntos para llamar a una constante
    // Obtener el valor mediante el objeto:
    $tuMoto = new Moto();
    echo $tuMoto::ruedas ."<br/>";
?>