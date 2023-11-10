<?php
class CarteleraController
{
    function __construct()
    {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
    }
 
 
    public function index()
    {
        //Incluye el modelo que corresponde
        require 'models/CarteleraModel.php';
 
        //Creamos una instancia de nuestro "modelo"
        $items = new CarteleraModel();
 
        //Le pedimos al modelo todos los items
        $listado = $items->getCartelera();
 
        
        
        //Finalmente presentamos nuestra plantilla
        //$this->view->show("listarView.php", $data);
        $this->view->show("listarView.php", array(  'cartelera' => $listado)  );
    }
 
   
}
?>