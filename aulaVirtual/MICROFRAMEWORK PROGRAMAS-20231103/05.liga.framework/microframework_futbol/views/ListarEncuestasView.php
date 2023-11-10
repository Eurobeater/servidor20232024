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
        <th>Encuestas</th>
	</tr>
    <?php
    // $listado es una variable asignada desde el controlador ItemsController.
	
    foreach( $encuestas as $encuesta )
    {
    ?>
    <tr>
        <td><a href="index.php?controlador=encuesta&accion=listarPreguntasRespuestas&encuesta_id=<?php echo $encuesta->getEncuesta_id()?>"><?php echo $encuesta->getEncuesta()?></a></td>
	 
    </tr>
    <?php
    }
    ?>
</table>

</body>
</html>