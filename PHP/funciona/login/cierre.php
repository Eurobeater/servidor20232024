<?php
    session_start();            //importante comenzar una sesion en el fichero de cerrar sesión, de lo contrario, no cierra
    session_destroy();          //cerrar sesión
    header("location:login.php");
?>
