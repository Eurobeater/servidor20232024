<?php
include('conexion.php');

$_SESSION['acceso'] = false;        //esto es una variable global llamada 'acceso'. puede ser true o false. por defecto es false. cuando sea true el usuario podra acceder
$usu = $_GET['usuario'];
$psw = $_GET['clave'];

$sql = "select * from usuarios where usuario='$usu' and clave = '$psw'";        
$resultado = mysqli_query($descriptor, $sql);
$row=mysqli_fetch_array($resultado);            //el array quedara vacio si no se cumple la condicion de la consulta SQL

if ($row['usuario'] <>null) {       //es lo mismo que '!='. significa que si no es nulo, se hace la siguiente condicion. si el array esta vacio no se cumple la condicion.
    $_SESSION['acceso'] = true;
}else {
    $_SESSION['acceso'] = false;
}
header('LOCATION:index.php');
?>