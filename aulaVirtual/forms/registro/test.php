<?php




function conexion()
{   
    $dsn = "mysql:dbname=test";
    $username = "root";
    $password = "";
    $conexion = new PDO( $dsn, $username, $password );
	$conexion->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    return $conexion;

}

function registro( $nombre, $password)
{
	$conexion = conexion();
	
	$sql = "select * from reg_usuarios where usuario = ? and password = ?";
	$rs = $conexion->prepare( $sql );
	$rs->bindParam( 1, $nombre );
	$rs->bindParam( 2, $password);
	$rs->execute();
	
	
	if( $row = $rs->fetch() )
		return true;
	else
		return false;
	

}


if( isset( $_POST[ "usuario" ] ) && isset( $_POST[ "password" ] ) && registro( $_POST[ "usuario" ],$_POST[ "password" ]))
{
	printf( "Se ha logueado");
	
}
else
{
	printf( "<a href=\"prueba.html\">Error. Vuelva a intentarlo</a>");
}

?>