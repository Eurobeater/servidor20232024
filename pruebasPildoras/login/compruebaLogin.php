<?php
$dsn = "mysql:dbname=sesionesPildoras";
$username = "root";
$password = "";

$conexion = new PDO( $dsn, $username, $password );
$sql = 'SELECT * FROM usuarios WHERE usuarios = :login AND password = :password';
$resultado = $conexion->prepare($sql);                   // Utilizar prepare para preparar la consulta. prepare() permite la ejecución de consultas preparadas para evitar inyección SQL
//$resultado = $conexion->query($sql);      no se usa en los logins

$login = $_POST['login'];
$password = $_POST['password'];

// Asociar parámetros y ejecutar la consulta.               los bindParam vincula valores a parámetros (en este caso login y password) en la consulta preparada ($sql). evita la inyección de SQL
$resultado->bindParam(':login', $login);                    //se asocian los valores $_POST['login'] y $_POST['password'] a los parámetros :login y :password
$resultado->bindParam(':password', $password);
//$resultado->bindValue(':login', $login);                  //bindValue(), de momento, funciona igual que bindParam()      
//$resultado->bindValue(':password', $password);
$resultado->execute();                                    //ejecuta la consulta preparada con los parámetros asociados. se hace la consulta en la BDD con los valores proporcionados y asociados a parámetros


$numeroRegistro = $resultado->rowCount();               //rowCount() devuelve el número de filas afectadas por la última sentencia SQL ejecutada. verifica si se obtuvieron resultados de consulta

if ($numeroRegistro != 0) {                      //si se obtuvo algún registro (si no es 0), si se obtuvieron resultados, se muestra un mensaje. si no, redirecciona a login.php
    session_start();                                //abrir una sesión
    $_SESSION['usuario'] = $_POST['login'];             //lo que hay en los corchetes es el nombre de la variable súperlocal $_SESSION. Acto seguido meter en la variable el usuario rescatado con $POST
    header("location:usuariosRegistrados1.php");
}else {
    header("location:login.php");
}


if ($resultado) {           //if $resultado == true                                     PROBABLEMENTE SE BORRE
        echo "funciona";

    } else {
        echo "No se pudieron obtener resultados de la consulta.";
    }

?>