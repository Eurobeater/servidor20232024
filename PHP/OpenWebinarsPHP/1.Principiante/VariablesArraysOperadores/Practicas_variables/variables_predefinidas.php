<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
<?php

	$numero = 33;

	echo "<p> <strong> Nombre del Servidor: </strong> " . $_SERVER['SERVER_NAME'] . "</p> ";
	echo "<p> <strong> Software del Servidor: </strong> " . $_SERVER['SERVER_SOFTWARE'] . "</p> ";
	echo "<p> <strong> Puerto del Servidor: </strong> " . $_SERVER['SERVER_PORT'] . "</p> ";
	
	echo "<p> <strong> Variable número: </strong> " . $GLOBALS['numero'] . "</p> ";
?>
</body>
</html>