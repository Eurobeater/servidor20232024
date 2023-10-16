<?php
//establecer la conexion a la base de datos
include('conexion.php');

//recoger los datos
$cod = $_POST['codigo'];
$pro = $_POST['producto'];
$det = $_POST['detalle'];
$pre = $_POST['precio'];
$des = $_POST['descuento'];

//nombre y ruta de la imagen
$ima = "./images/" .$cod. ".jpg";

//crear sentencia SQL
$sql = "insert into productos (codigo, producto, detalle, precio, descuento, imagen) values ('$cod', '$pro', '$det', '$pre', '$des', '$ima')";

//ejecutar sentencia SQL
mysqli_query($descriptor, $sql);

//copiamos la imagen que nos ha llegado
$ruta=$ima;
copy($_FILES['imagen']['tmp_name'], $ruta);

//redireccionamos a la web de listado
header("LOCATION:listado.php");
?>