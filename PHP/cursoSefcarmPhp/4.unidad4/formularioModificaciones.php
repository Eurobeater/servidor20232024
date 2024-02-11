<html>
<head></head>
<body>
    <?php
    //Estableciendo la conexión
    include('conexion.php');
    //recogida de datos
    $cod = $_POST['codigo'];
    //Creamos la sentencia SQL
    $sql = "select * from productos where codigo='$cod'";
    //ejecutamos la sentencia
    $resultado = mysqli_query($descriptor, $sql);
    //asignamos el resultado a una variable
    $row = mysqli_fetch_array($resultado);
    ?>
    <form action="modificaciones.php" method="POST" enctype="multipart/form-data">
        <table width="400px" border="0">
            <tr>
                <td colspan="4">Modificación de productos</td>
            </tr>
            <tr>
                <td>Código</td>
                <td><input type="text" name="codigo" value="<?php echo $row['codigo']; ?>" readonly="readonly" /></td>
                <td>Producto</td>
                <td><input type="text" name="producto" value="<?php echo $row['producto']; ?>" /></td>
            </tr>
            <tr>
                <td>Detalle</td>
                <td colspan="3"><input type="text" name="detalle" value="<?php echo $row['detalle']; ?>" /></td>
            </tr>
            <tr>
                <td>Precio</td>
                <td><input type="text" name="precio" value="<?php echo $row['precio']; ?>" /></td>
                <td>Descuento</td>
                <td><input type="text" name="descuento" value="<?php echo $row['descuento']; ?>" /></td>
            </tr>

            <tr>
                <td colspan="2"><img src="<?php echo $row['imagen']; ?>"></td>
                <td colspan="2">Nueva foto<input type="file" name="imagen" id="imagen" /></td>
            </tr>
            <tr>
                <td colspan="4"><input type="submit" name="boton1" value="Enviar" /></td>
                <td colspan="2"><input type="reset" name="boton2" value="Borrar" /></td>
            </tr>
        </table>
    </form>
</body>
</html>