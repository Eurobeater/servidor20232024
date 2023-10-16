<?php
    session_start();
    if (!isset($_SESSION['acceso']) or $_SESSION['acceso']==false){         //si no esta la variable acceso o acceso es false, redirecciona al usuario a index.php
        header("LOCATION:index.php");
    }else{
        echo "Bienvenido al sistema";
?>
<a href="desactivación.php">Desconectar </a>                <!-- Al pinchar lleva al usuario al script para cerrar sesion -->
<?php
    }
 ?>