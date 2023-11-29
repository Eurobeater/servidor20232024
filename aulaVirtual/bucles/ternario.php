<?php
for( $cont = 0; $cont < 100; $cont++ )
{
	if( $cont == 0 )
	{	
		$fibo0 = 0;
		$fibo = $fibo0;
	}
	else if( $cont == 1 )
	{	
		$fibo1 = 1;
		$fibo = $fibo1;
	}
	else
	{
		$fibo = $fibo0 + $fibo1;
		$fibo0 = $fibo1;
		$fibo1 = $fibo;
		
	}		
	
	
	echo $cont . " " . $fibo. "<br>";
}
?>