<?php

function factorial( $valor )
{
	if( $valor == 0 ) 
		$resultado = 1;
	else
	{	
		$resultado = 1;
		for( $i = 1; $i <= $valor; $i++ )
				$resultado = $resultado * $i;
		
	}
	return $resultado;
}


if( isset( $_POST["Enviar"] ) ) 
{	

	print_r( $_POST );
	if( isset( $_POST["numero"] ))
		echo "El factorial del numero que has introducido es " . factorial($_POST["numero"]);
	else 
		echo "se ha producido un error";
}



