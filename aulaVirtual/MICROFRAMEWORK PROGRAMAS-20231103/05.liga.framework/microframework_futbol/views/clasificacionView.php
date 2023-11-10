<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Encuestas</title>
</head>
<body>




<table>
    <tr>
        <th>Clasificacion</th>
	</tr>
    <?php
    // $listado es una variable asignada desde el controlador ItemsController.
	
	foreach( $clasificacion as $equipo => $puntos )
    {
    ?>
    <tr>
        <td><?php echo $equipo?></td>
        <td><?php echo $puntos?></td>
    </tr>
    <?php
    }
    ?>
</table>
<a href="index.php?controlador=liga&accion=listarJornada">Jornada</a>&nbsp;&nbsp;
<a href="index.php?controlador=liga&accion=clasificacion">Clasificacion</a>
</body>
</html>