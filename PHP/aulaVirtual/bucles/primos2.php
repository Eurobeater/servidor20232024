<?php

for( $i = 0; $i < 1000; $i++ )
{
	$primo = true;
	for( $j = 2; $j < $i / 2 && $primo; $j++ )
	{
		if( $i % $j == 0 )
		{
			$primo = false;
		}
	}
	
	
	if( $primo )
	{
		echo $i. "<br>";
	}

}
?>