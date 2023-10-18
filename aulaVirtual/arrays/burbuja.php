<?php

$vector = array( 7, 4, 5, 1, 0);
print_r( $vector );
	echo "</br>";

for( $i = 0; $i < count( $vector ) - 1; $i++ )
{
    for( $j = 0; $j < count( $vector ) - $i - 1; $j++ )
    {
        
        if( $vector[ $j ] > $vector[ $j + 1 ] )
        {
			$aux = $vector[ $j + 1  ];
			$vector[ $j + 1 ] = $vector[ $j ];
			$vector[ $j ] = $aux; 
        }    
    }
    
	print_r( $vector );
	echo "</br>";
}
print_r( $vector );
?>