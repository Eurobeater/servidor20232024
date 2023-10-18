<?php

$conexion = new PDO( "mysql:host=localhost;dbname=test", "root", "" );
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
	
	$sql = "update usuarios set nombre = ? where codigo = ?";
	$rs = $conexion->prepare( $sql );
	$rs->bindParam( 1, $nombre);
	$rs->bindParam( 2, $codigo);
	
	$nombre = "fernando";

	$codigo = 161406;
	$rs->execute();
	
	print "Transaccion Realizada";
	
} 
catch(PDOException $e) {
       
        print "Error!: " . $e->getMessage() . "</br>";
}



?>