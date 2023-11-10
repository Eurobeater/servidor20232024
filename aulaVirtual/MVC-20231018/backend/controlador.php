<?php
// Incluir el modelo
require_once('modelo.php');
// Incluir la presentacion
require_once('vista.php');


if(  isset( $_REQUEST['opcion'] ) && $_REQUEST['opcion'] == 'actualizar' )
{
	print( $_REQUEST['opcion'] );
	$jornada = ultima_jornada();	
	$partidos = getResultados( $jornada );
	foreach( $partidos as $partido )
	{
		if( isset( $_REQUEST['local' . $partido[ 'partido_id']]) )
			updateLocal( $partido[ 'partido_id'], $_REQUEST['local' . $partido[ 'partido_id']] );
		
		if( isset( $_REQUEST['visitante' . $partido[ 'partido_id']]) )
			updateVisitante( $partido[ 'partido_id'], $_REQUEST['visitante' . $partido[ 'partido_id']] );
		if( isset( $_REQUEST['estado' . $partido[ 'partido_id']]) )
			updateEstado( $partido[ 'partido_id'], $_REQUEST['estado' . $partido[ 'partido_id']] );
	}
}


$jornada = ultima_jornada();	
$resultados = getResultados( $jornada );
print_jornada(  $resultados );


?>