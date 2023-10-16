<html>
<head>
</head>
<body>
    <form action="altas.php" method="POST" enctype="multipart/form-data">
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
                <td colspan="2"><input type="submit" name="boton1" value="Enviar" />
                </td>
                <td colspan="2"><input type="reset" name="boton2" value="Borrar" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>