<?php
class EquipoModel
{
    protected $db;
 
    private $EQUIPO_ID;
    private $EQUIPO;
    
    public function __construct()
    {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }
 
    public function getEquipo()
    {
        return $this->EQUIPO;
    }
    
    
    
    public function getEquipoById( $codigo )
    {
        //realizamos la consulta de todos los items
        $consulta = $this->db->prepare('SELECT * FROM LIGA_EQUIPOS where EQUIPO_ID = ?');
        $consulta->bindParam( 1, $codigo );
        $consulta->execute();
        
        $consulta->setFetchMode(PDO::FETCH_CLASS, "EquipoModel");
        $resultado = $gsent->fetch();
        
        
        return $resultado;
    }
	
	
}
?>