<?php
//Estableciendo la conexión
include('conexion.php');

if (isset($_POST['boton1'])) {
    //recogida de datos
    $cod = $_POST['codigo'];
    $pro = $_POST['producto'];
    $det = $_POST['detalle'];
    $pre = $_POST['precio'];
    $des = $_POST['descuento'];

    //nombre y ruta de la imagen
    $ima = "./images/" . $cod . ".jpg";

    //creamos la sentencia SQL
    $sql = "insert into productos (codigo,producto,detalle,precio,"
        . "descuento,imagen) values ('$cod','$pro','$det','$pre',"
        . "'$des','$ima') ";

    //ejecutamos la sentencia SQL
    mysqli_query($descriptor, $sql);

    //copiamos la imagen que nos ha llegado
    if (($_FILES['imagen']['name'] != null)) {
        $ima = "./images/" . $cod . ".jpg";
        copy($_FILES['imagen']['tmp_name'], $ima);
    }
}

//Creamos la sentencia SQL
$sql = "select * from productos";
$resultado = Mysqli_query($descriptor, $sql);

//Creamos un bucle para recorrer todos los registros
while ($row = mysqli_fetch_array($resultado)) {
    echo $row['codigo'] . "<br/>";
    echo $row['producto'] . "<br/>";
    echo $row['detalle'] . "<br/>";
    echo $row['precio'] . "<br/>";
    echo $row['descuento'] . "<br/>";
    echo "<img src='" . $row['imagen'] . "'>'" . "<br/>";
}
?>

<html>
<head></head>
<body>
    <form action="formulario_recursivo.php" method="POST" enctype="multipart/form-data">
        <table width="400px" border="0">
            <tr>
                <td colspan="4">Alta de productos</td>
            </tr>
            <tr>
                <td>Código</td>
                <td><input type="text" name="codigo" /></td>
                <td>Producto</td>
                <td><input type="text" name="producto" /></td>
            </tr>
            <tr>
                <td>Detalle</td>
                <td colspan="3"><input type="text" name="detalle" /></td>
            </tr>
            <tr>
                <td>Precio</td>
                <td><input type="text" name="precio" /></td>
                <td>Descuento</td>
                <td><input type="text" name="descuento" /></td>
            </tr>
            <tr>
                <td>Imagen</td>
                <td colspan="3"><input type="file" name="imagen" /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="boton1" value="Enviar" /></td>
                <td colspan="2"><input type="reset" name="boton2" value="Borrar" /></td>
            </tr>
        </table>
    </form>
</body>
</html>