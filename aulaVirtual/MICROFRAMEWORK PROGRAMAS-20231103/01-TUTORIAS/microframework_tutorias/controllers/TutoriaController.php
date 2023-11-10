<?php
class TutoriaController
{
    public $view;
    function __construct()
    {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
    }
    public function listarCursos()
    {
        //Incluye el modelo que corresponde
        require 'models/TutoriaModel.php';
 
        //Creamos una instancia de nuestro "modelo"
        $items = new TutoriaModel();
 
        //Le pedimos al modelo todos los items
        $listado = $items->getCursos();
        $this->view->show("cursosView.php", array(  'cursos' => $listado)  );
    }

    public function profesorado()
    {
        //Incluye el modelo que corresponde
        require 'models/TutoriaModel.php';
 
        //Creamos una instancia de nuestro "modelo"
        $items = new TutoriaModel();
 
        //Le pedimos al modelo todos los items
        $profesorado = $items->getProfesorado($_GET["curso"]);
        $tutor = $items->getTutor($_GET["curso"]);
     
        $this->view->show("profesoradoView.php", array(  'profesorado' => $profesorado,"tutor" => $tutor)  );
    }
 
   
}
?>