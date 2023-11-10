<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Encuestas</title>
</head>
<body>

<form action="index.php" >
<input type="hidden" name="controlador" value="liga" >
<input type="hidden" name="accion" value="listarJornada" >
<select name="jornada" >
<?php 
foreach( $jornadas as $jornada )
{
?>
	<option value="<?php echo $jornada->getJornada_ID()?>"><?php echo $jornada->getJornada_ID()?>
	</option>
<?php
}
?>
</select>

<input type="submit" name="submit" value=">>" >
</form>

<table>
    <tr>
        <th>Partidos</th>
	</tr>
    <?php
    // $listado es una variable asignada desde el controlador ItemsController.
	
    foreach( $partidos as $partido )
    {
    ?>
    <tr>
        <td><?php echo $partido['LOCAL']?></td>
        <td><?php echo $partido['VISITANTE']?></td>
        <td><?php echo $partido['MARCADOR_LOCAL']?></td>
        <td><?php echo $partido['MARCADOR_VISITANTE']?></td>
    </tr>
    <?php
    }
    ?>
</table>
<a href="index.php?controlador=liga&accion=listarJornada">Jornada</a>&nbsp;&nbsp;
<a href="index.php?controlador=liga&accion=clasificacion">Clasificacion</a>
</body>
</html>