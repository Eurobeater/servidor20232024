<?php
class TutoriaModel
{
    protected $db;
 
    
 
	
	public function __construct()
    {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }
 
    
    public function getCursos()
    {
        
        
        $gsent = $this->db->prepare('SELECT * FROM tutorias_niveles, tutorias_cursos WHERE tutorias_niveles.NIVEL_ID = tutorias_cursos.NIVEL_ID ORDER BY tutorias_niveles.ORDEN');
        
		$gsent->execute();

        $resultado = $gsent->fetchAll();
        return $resultado;
    }


    public function getProfesorado( $curso )
    {
        
        
        $gsent = $this->db->prepare('select * from tutorias_cursos, tutorias_profesores, tutorias_imparte, tutorias_asignaturas, tutorias_tutorias where tutorias_cursos.CURSO_ID = tutorias_imparte.CURSO_ID and tutorias_asignaturas.ASIGNATURA_ID = tutorias_imparte.ASIGNATURA_ID and tutorias_imparte.PROFESOR_ID = tutorias_profesores.PROFESOR_ID AND tutorias_tutorias.PROFESOR_ID = tutorias_profesores.PROFESOR_ID and tutorias_cursos.CURSO_ID = ?');
        
        $gsent->bindParam( 1, $curso );

		$gsent->execute();

        $resultado = $gsent->fetchAll();
        return $resultado;
    }
    
    public function getTutor( $curso )
    {
        
        
        $gsent = $this->db->prepare('select * from tutorias_profesores, tutorias_cursos where tutorias_CURSOS.TUTOR_ID = tutorias_profesores.PROFESOR_ID and curso_id =?');
        
        $gsent->bindParam( 1, $curso );

		$gsent->execute();

        $resultado = $gsent->fetch();
        return $resultado;
    }
    
}
?>