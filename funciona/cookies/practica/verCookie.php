<?php
    if (!$_COOKIE['idiomaSeleccionado']) {       //si no existe la cookie idiomaSeleccionado
        header("Location: pag1.php");
    }else if ($_COOKIE["idiomaSeleccionado"] == "es") {         //si la cookie idiomaSeleccionado vale "es", redirige a spanish.php
        header("Location:spanish.php");
    }else if ($_COOKIE['idiomaSeleccionado'] == "en"){          //si la cookie idiomaSeleccionado vale "en", redirige a english.php
        header("Location:english.php");
    }
?>