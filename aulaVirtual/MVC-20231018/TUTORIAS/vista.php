<?php
function cabecera()
{
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<title>Membership Form</title>
		<link rel="stylesheet" type="text/css" href="common.css" />
		<style type="text/css">
			.error {
				background: #d33;
				color: white;
				padding: 0.2em;
			}
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


function displayError()
{
	
	echo "<h1>Error</h1>";
}

function displayCursos($cursos)
{
	$nivel = $cursos[0]["NIVEL"];
	$first = true;
	foreach( $cursos as $item )
	{
		if( $first || $nivel != $item[ "NIVEL"])
		{
			$first = false;
			$nivel = $item[ "NIVEL"];
			echo "<h1>" .$nivel."</h1>";
		}

		echo "<a href='controlador.php?CURSO_ID={$item[ 'CURSO_ID']}'>{$item[ 'CURSO']}</a> ";


	}
}

function displayProfesorado($tutor, $profesorado)
{
	
    echo "<h1>{$tutor['CURSO']}</h1>";
	foreach( $profesorado as $item )
	{
		echo $item[ "APELLIDOS"] . ", " . $item[ "NOMBRE"] . "&emsp;" . $item[ "ASIGNATURA"] . "&emsp;" . $item[ "DIA"] . "&emsp;" . $item[ "HORA"] . "<BR>"; 
	}
	echo "Tutor=> {$tutor[ 'APELLIDOS']},  {$tutor[ 'NOMBRE']}";


	echo "<br><a href='controlador.php'>Volver</a>";
}
