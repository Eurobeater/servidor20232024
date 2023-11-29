<?php
function cabecera()
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Membership Form</title>
<link rel="stylesheet" type="text/css" href="common.css" />
<style type="text/css">
.error { background: #d33; color: white; padding: 0.2em; }


</style>
</head>
<body>
<?php
}

function pies()
{
?>
</body>
</html>
<?php
}



function displayCartelera($cartelera)
{
	
	cabecera()
	?>
	<H1>Cartelera</H1>
	
	<?php
	$cine = $cartelera[0][ "CINE"];
	$sala = $cartelera[0][ "SALA"];
	$titulo = $cartelera[0][ "TITULO"];
	$first = true;
	$i = 0;
	while(  $i < count( $cartelera ) )
	{
		if( $first )
		{
			$cine = $cartelera[$i][ "CINE"];
			echo "<h1>".$cine . "</h1>";
			$first = false;
		}
		$linea = $cartelera[$i][ "SALA"] . " " . $cartelera[$i][ "TITULO"];
		while ( $i < count( $cartelera ) &&$cine == $cartelera[$i][ "CINE"] && $sala == $cartelera[$i][ "SALA"] && $titulo == $cartelera[$i][ "TITULO"] )
		{
			$linea = $linea ." " .$cartelera[$i][ "HORA"];
			
			$i++;
		}
		echo $linea . "<br>";
		if(  $i < count( $cartelera ) )
		{	
			$sala = $cartelera[$i][ "SALA"];
			$titulo = $cartelera[$i][ "TITULO"];
			if( $cine != $cartelera[$i][ "CINE"] )
			{
				$cine = $cartelera[$i][ "CINE"];
				$first = true;
			}
		}
	}
	


	
	pies();
}

