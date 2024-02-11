<?php

require "db.php";
function getCursos( )
{


	$result = $GLOBALS['DB']->prepare( "SELECT * FROM tutorias_niveles, tutorias_cursos WHERE tutorias_niveles.NIVEL_ID = tutorias_cursos.NIVEL_ID ORDER BY tutorias_niveles.ORDEN;
	");
	
	
	$result->execute();
	$resultado = $result->fetchAll();
	return $resultado;

}

function getProfesorado( $curso )
{


	$result = $GLOBALS['DB']->prepare( "select * from tutorias_cursos, tutorias_profesores, tutorias_imparte, tutorias_asignaturas, tutorias_tutorias where tutorias_cursos.CURSO_ID = tutorias_imparte.CURSO_ID and tutorias_asignaturas.ASIGNATURA_ID = tutorias_imparte.ASIGNATURA_ID and tutorias_imparte.PROFESOR_ID = tutorias_profesores.PROFESOR_ID AND tutorias_tutorias.PROFESOR_ID = tutorias_profesores.PROFESOR_ID and tutorias_cursos.CURSO_ID = ?");
	
	$result->bindParam(1, $curso );
	$result->execute();
	$cartelera = $result->fetchAll();
	return $cartelera;

}


function getTutor( $curso)
{


	$result = $GLOBALS['DB']->prepare( "select * from tutorias_profesores, tutorias_cursos where tutorias_CURSOS.TUTOR_ID = tutorias_profesores.PROFESOR_ID and curso_id =?");
	
	$result->bindParam(1, $curso );
	$result->execute();
	$tutor = $result->fetch();
	return $tutor;

}

?>