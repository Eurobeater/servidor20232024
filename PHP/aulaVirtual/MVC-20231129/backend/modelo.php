<?php

require "db.php";

function updateLocal( $partido_id, $marcador )
{
	$sentencia = "update liga_partidos set marcador_local = ? where partido_id = ?";
	$resultado  = $GLOBALS['DB']->prepare($sentencia);
	$resultado->bindParam( 1, $marcador );
	$resultado->bindParam( 2, $partido_id );
	$resultado->execute();
}
function updateVisitante( $partido_id, $marcador )
{
	$sentencia = "update liga_partidos set marcador_visitante = ? where partido_id = ?";
	$resultado  = $GLOBALS['DB']->prepare($sentencia);
	$resultado->bindParam( 1, $marcador );
	$resultado->bindParam( 2, $partido_id );
	$resultado->execute();
}
function updateEstado( $partido_id, $estado )
{
	$sentencia = "update liga_partidos set estado = ? where partido_id = ?";
	$resultado  = $GLOBALS['DB']->prepare($sentencia);
	$resultado->bindParam( 1, $estado );
	$resultado->bindParam( 2, $partido_id );
	$resultado->execute();
}
	

function existe( $jornada )
{
	$sentencia = "select * from liga_jornadas where jornada_id = ?";
	$resultado  = $GLOBALS['DB']->prepare($sentencia);
	$resultado->bindParam( 1, $jornada );
	$resultado->execute();
	
	$rows = $resultado->fetchAll();
	
	
	if(  $resultado->rowCount() > 0 ) 
		return 1;
	else 
		return 0;
	
	
}
	
function getJornadas()
{
	
	$sentencia = "select * from liga_jornadas";
	$resultado  = $GLOBALS['DB']->prepare($sentencia);
	$resultado->execute();

	// Recupera todas las filas en un array
	$jornadas = $resultado->fetchAll();
	print_r( $jornadas);
	return( $jornadas );
}

function ultima_jornada()
{
	$sentencia = "select max( jornada_id ) from liga_jornadas";
	$resultado  = $GLOBALS['DB']->prepare($sentencia);
	$resultado->execute();

	// Recupera todas las filas en un array
	$row = $resultado->fetch();
	$jornada = $row[ 0 ];

	return $jornada;
}

function getResultados( $jornada  )
{
	$sentencia = "select partido_id, a.equipo as local , b.equipo as visitante, marcador_local , marcador_visitante, estado from liga_partidos, liga_equipos as a, liga_equipos as b where liga_partidos.local_id = a.equipo_id and liga_partidos.visitante_id = b.equipo_id and jornada_id = ? order by partido_id";
	$resultado  = $GLOBALS['DB']->prepare($sentencia);
	$resultado->bindParam( 1, $jornada );
	$resultado->execute();

	// Recupera todas las filas en un array
	$resultados = $resultado->fetchAll();
	
	return( $resultados );
}



function getClasificacion()
{
	$sentencia = "select * from liga_equipos";
	$resultado  = $GLOBALS['DB']->prepare($sentencia);
	$resultado->execute();
	
	
	$cont = 0;
	
	while( $row = $resultado->fetch() )
	{
		$equipos_id[$row[ 'EQUIPO_ID' ]] = $cont;
		$equipos[] = $row[ 'EQUIPO' ];
		$puntos[] = 0;
		$jugados[] = 0;
		$cont++;
	}
	
	$sentencia = "select * from liga_partidos order by partido_id";
	$resultado  = $GLOBALS['DB']->prepare($sentencia);
	$resultado->execute();

	// Recupera todas las filas en un array
	$partidos = $resultado->fetchAll();
	
	foreach( $partidos as $partido )
	{
		if( $partido[ "MARCADOR_LOCAL" ] > $partido[ "MARCADOR_VISITANTE" ] )
		{
				$puntos[ $equipos_id[ $partido["LOCAL_ID" ] ] ] +=3;
		}
		elseif ( $partido[ "MARCADOR_LOCAL" ] == $partido[ "MARCADOR_VISITANTE" ] )
		{
				$puntos[ $equipos_id[ $partido["LOCAL_ID" ] ] ] +=1;
				$puntos[ $equipos_id[ $partido["VISITANTE_ID" ] ] ] +=1;
		}
		else
		{
				$puntos[ $equipos_id[ $partido["VISITANTE_ID" ] ] ] +=3;
			
		}
		print_r( $jugados );
		print( "<br>");
		$jugados[ $equipos_id[ $partido["LOCAL_ID" ] ] ] +=1;
		$jugados[ $equipos_id[ $partido["VISITANTE_ID" ] ] ] +=1;
	}

	
	
	array_multisort($puntos, SORT_DESC, $equipos, $jugados );
	
	
	for( $i = 0; $i < count( $puntos ); $i++ )
	{
		$clasificacion[] = array( 'equipo' => $equipos[ $i ], 'puntos' => $puntos[ $i ], 'jugados' => $jugados[ $i ] );
	}

	return( $clasificacion );
}



?>