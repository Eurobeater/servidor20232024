<?php
class Persona {
public $nombre;
public $apellidos;

function __construct() {
}
}

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






# using the shortcut ->query() method here since there are no variable
# values in the select statement.
$STH = $DBH->query('SELECT * from personas');
# setting the fetch mode
$STH->setFetchMode(PDO::FETCH_CLASS, 'Persona' );
while($row = $STH->fetch()) {
	echo $row->nombre . "<br/>";
	echo $row->apellidos . "<br/>";
}






