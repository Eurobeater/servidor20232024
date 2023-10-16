<?php
    include('conexion.php');

    //recoger datos del formulario formularioBajas.php
    $cod = $_POST['codigo'];

    //crear sentencia SQL (borrar)
    $sql = "delete from productos where codigo = '$cod'";

    //ejecutar sentencia SQL
    mysqli_query($descriptor, $sql);

    //borramos la imagen
    $ruta="./images/".$cod.".jpg";
    unlink($ruta);

    //redireccionar a la web del listado (listado.php)
    header("LOCATION:listado.php")
?>