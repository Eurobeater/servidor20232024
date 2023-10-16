<?php

    $servidor="localhost";
    $usuario="root";
    $clave="";
    $basededatos="empresa";

    $descriptor = mysqli_connect($servidor, $usuario, $clave);
    mysqli_select_db($descriptor, $basededatos);
?>