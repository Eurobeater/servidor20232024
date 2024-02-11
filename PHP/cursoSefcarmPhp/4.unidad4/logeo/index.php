<?php
    session_start();
    if (!isset($_SESSION['acceso']) or $_SESSION['acceso']==false){
 ?>       
<form action="activacion.php" method="get">
    <p>Usuario <input name="usuario" type="text" /> <br/>
    <p>Clave <input name="clave" type="password" /> <br/>
    <input type="submit" name="boton1" vakue="Enviar"/>
    <input type="reset" name="boton2" value="Borrar"/>
    </p>
</form>
<?php
    }elseif ($_SESSION['acceso'] == true ){
        echo "Bienvenido al sistema";echo "<a href='menu.php'>Menú</a>";
    ?>
<a href="desactivacion.php">Desconectar </a>
<?php
    } 
?>


