<?php
    session_start();
    $_SESSION['acceso'] = false;      //pone la variable global 'acceso' en false, y despues lleva de vuelta a index.php
    header("LOCATION:index.php");
?>
