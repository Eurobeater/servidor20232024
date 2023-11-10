<?php

require "db.php";

function getResultados( $fecha )
{


	$result = $GLOBALS['DB']->prepare( "select * from sorteo_premios where  fecha = ?");
	$fecha = fechaUSA( $fecha );
	$result->bindParam( 1, $fecha );
	$result->execute();
	$row = $result->fetch();
	if( isset( $row ) )
	{
		
		$resultado = array( "numero" => $row['numero'], "premio" => $row['premio']  );
		return( $resultado);
	}
	else
		return null;

}
?>