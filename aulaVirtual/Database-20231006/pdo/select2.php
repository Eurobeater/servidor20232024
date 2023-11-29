<?php

$dbname = "test";
$user = 'root';
$pass = "";

try {
$DBH = new PDO("mysql:host=localhost;dbname=$dbname", $user, $pass);
$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}catch(PDOException $e) {
echo "I'm sorry, Dave. I'm afraid I can't do that.";
file_put_contents('PDOErrors.txt', $e->getMessage(),
FILE_APPEND);
}

$STH = $DBH->prepare("INSERT INTO personas (nombre, apellidos) values (?, ?)");

$STH->bindParam(1, $nombre);
$STH->bindParam(2, $apellidos);


$nombre = "Daniel";
$apellidos = "1 Wicked Way";


$STH->execute();

$STH = $DBH->prepare("INSERT INTO personas (nombre, apellidos) value (:nombre, :apellidos)");

$STH->bindParam(':nombre', $nombre);
$STH->bindParam(':apellidos', $apellidos);

$STH->execute();


# using the shortcut ->query() method here since there are no variable
# values in the select statement.
$STH = $DBH->query('SELECT * from personas');
# setting the fetch mode
$STH->setFetchMode(PDO::FETCH_ASSOC);
while($row = $STH->fetch()) {
	echo $row['nombre'] . "<br/>";
	echo $row['apellidos'] . "<br/>";
}


$STH = $DBH->prepare( "select * from personas where nombre = ?");
$nombre = "antonio";
$STH->bindParam( 1, $nombre );
$STH->execute();
$rows = $STH->fetchAll();
foreach( $rows as $row )
{
	echo $row['nombre'] . "<br/>";
	echo $row['apellidos'] . "<br/>";
}




