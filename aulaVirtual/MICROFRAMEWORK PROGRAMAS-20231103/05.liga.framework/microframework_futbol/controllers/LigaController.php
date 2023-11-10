<?php
class LigaController
{
    function __construct()
    {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
    }
 
 
    
	public function clasificacion()
    {
        //Incluye el modelo que corresponde
        require 'models/JornadaModel.php';
		require 'models/PartidoModel.php';
		
        //Creamos una instancia de nuestro "modelo"
        $jornadas = new JornadaModel();
		$partido = new PartidoModel();
 
        	
		$clasificacion = $partido->getClasificacion();
 
        
 
        //Finalmente presentamos nuestra plantilla
        $this->view->show("clasificacionView.php", [ 'clasificacion' => $clasificacion ] );
    }
	
	
    public function listarJornada()
    {
        //Incluye el modelo que corresponde
        require 'models/JornadaModel.php';
		require 'models/PartidoModel.php';
		
        //Creamos una instancia de nuestro "modelo"
        $jornadas = new JornadaModel();
		$partido = new PartidoModel();
 
        //Le pedimos al modelo todos los encuestas
        if( ! isset( $_REQUEST['jornada'] )) 
		{
			$jornada = $jornadas->getUltimaJornada();
			$partidos = $partido->getPartidosByJornada( $jornada->getJornada_ID());
			
		}
		else 
			
			$partidos = $partido->getPartidosByJornada( $_REQUEST['jornada']);
 
        
 
		$rounds = $jornadas->getAll();
        
        //Finalmente presentamos nuestra plantilla
        $this->view->show("ListarJornadaView.php", [ 'partidos' => $partidos, 'jornadas' => $rounds ] );
    }
	
    
}
?>