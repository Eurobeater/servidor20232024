<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>body {text-align: center; margin-left: 20px;} table, tr, td, th {border: solid;}</style>
    <title>MVC</title>
</head>
<body>
    <h1>MVC - Productos Controlador</h1>
</body>
</html>

<?php
//Archivo que gestiona las comunicaciones  entre el modelo y la vista (intermediario)
//poner las rutas de ambos ficheros. del Modelo y de la Vista
require_once("modelo/productosModelo.php");              //modelo. no se usan los dos puntos (..) para ir al directorio anterior. ya que se apunta desde el index (raiz)

$producto = new productosModelo();                  //instanciamos un producto llamando al constructor de la clase productosModelo
$matrizProductos = $producto->getProductos();       //crear variable para almacenar el array que nos devolverá. getProductos devuelve un array de los productos. se guarda la instacia de producto.

require_once("vista/productosView.php")                  //vista. no se usan los dos puntos (..) para ir al directorio anterior. ya que se apunta desde el index (raiz)
?>