<?php
$cont = 0;
$n = 2;

$numeros = array();
$marcas = array();

for( $i = 2; $i <= 100; $i++ )
{
	$numeros[] = $i;
	$marcas[] = true;
}
$continuar = true;
$i = 0;
while( $continuar )
{
	for( $j = $i + $numeros[ $i ]; $j <= 100 - 2; $j += $numeros[ $i ]  )
	{
		$marcas[ $j ] = false;
		
	}
	
	for( $i = $i + 1; $i <= 100 - 2 && $marcas[ $i ] == false ; $i++ ) ;
	
	if( $i > 100  - 2 ) $continuar = false;
	
}
for( $i = 0; $i <= 100 - 2; $i++ )
{
	if( $marcas[$i] ) 
	{
				
		echo $numeros[$i]. "</br>";
	}
		
}

?>