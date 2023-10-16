<?php
include('conexion.php');

//recoger datos
$cod = $_POST['codigo'];
$pro = $_POST['producto'];
$det = $_POST['detalle'];
$pre = $_POST['precio'];
$des = $_POST['descuento'];

$sql = "update productos set producto='$pro', detalle='$det', precio='$pre', descuento='$des' where codigo='$cod'";

mysqli_query($descriptor, $sql);

//actualizamos la imagen si hay cambio
if (($_FILES['imagen']['name'] != null)) {
    $ima = "./images/" . $cod . ".jpg";
    copy($_FILES['imagen']['tmp_name'], $ima);
}

//redireccionar
header('LOCATION:listado.php');

?>