<?php

$vector = array( 2, 4, 5, 1, 0);
print_r( $vector );
echo "</br>";

for( $i = 0; $i < count( $vector ) - 1; $i++ )
{
	$max = 0;
	
    for( $j = 1; $j < count( $vector ) - $i; $j++ )
    {
        
        if( $vector[ $max ] < $vector[ $j ] )
        {
            $max =  $j;
        }    
    }
    $aux = $vector[ $j - 1  ];
    $vector[ $j - 1 ] = $vector[ $max ];
    $vector[ $max ] = $aux; 
	
	print_r( $vector );
	echo "</br>";
}
print_r( $vector );
?>