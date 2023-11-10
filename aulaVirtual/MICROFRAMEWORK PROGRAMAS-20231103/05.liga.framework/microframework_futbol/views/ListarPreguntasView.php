<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Encuestas</title>
</head>
<body>


<form action="index.php">
<input type="hidden" name="controlador" value="encuesta">
<input type="hidden" name="accion" value="listarPreguntasRespuestas">
<input type="hidden" name="encuesta_id" value="<?php echo $encuesta_id?>">
<?php
 
	
	
	$i = 0;
	while( $i < count( $preguntas) )
	{
		
		?>
		<h3><?php echo $preguntas[$i][ 'pregunta']?></h3>
		<?php
		$pregunta_id = $preguntas[$i][ "pregunta_id"]; 
		while( $i < count( $preguntas) && $pregunta_id == $preguntas[$i][ 'pregunta_id'] ) 
		{
			?>
			<label for="<?php echo 'pregunta' .$preguntas[$i][ 'pregunta_id']?>"><?php echo $preguntas[$i][ 'respuesta']?></label>
			<input type="radio" name= "<?php echo 'pregunta' .$preguntas[$i][ 'pregunta_id']?>" value="<?php echo $preguntas[$i][ 'respuesta_id']?>">
			<?php
			
			$i++;
		}
		
	}
	?>
</br>
<input type="submit" name="submit" value="aceptar">
</form>

</body>
</html>