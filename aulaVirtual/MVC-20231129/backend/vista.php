<?php


function print_jornada( $resultados )
{

	?>

	<h1>Jornada</h1>
	<form action="controlador.php" >
	<input type="hidden" name="opcion" id="opcion"    value="actualizar" />
			
	<table BORDER="1">
	<tr><th>L</th><th>V</th></tr>
	<?php foreach ($resultados as $resultado) { ?>
	<tr>
	<td><?php echo $resultado['local'] ?></td>
	<td><?php echo $resultado['visitante'] ?></td>
	<td><?php printf( "<input type=\"text\" name=\"local%s\" id=\"local%s\"    value=\"%s\" />",$resultado['partido_id'],$resultado['partido_id'],$resultado['marcador_local'] )?></td>
	<td><?php printf( "<input type=\"text\" name=\"visitante%s\" id=\"visitante%s\"    value=\"%s\" />",$resultado['partido_id'],$resultado['partido_id'],$resultado['marcador_visitante'] )?></td>
	<td>
	<select name= "<?php echo "estado". $resultado['partido_id']; ?>" >
	<option value="P" <?php print(!strcmp("P",$resultado['estado'])? "selected":""); ?>>P</option>
	<option value="1" <?php print(!strcmp("1",$resultado['estado'])? "selected":""); ?>>1</option>
	<option value="D" <?php print(!strcmp("D",$resultado['estado'])? "selected":""); ?>>D</option>
	<option value="2" <?php print(!strcmp("2",$resultado['estado'])? "selected":"");  ?>>2</option>
	<option value="F" <?php print(!strcmp("F",$resultado['estado'])? "selected":""); ?>>F</option>
	</select>
	</tr>
	<?php } ?>
	</table>
	<input type="submit">
	</form>
	<?php
	
	
	

}

function print_clasificacion( $clasificacion )
{
	?>
	<h1>Clasificacion</h1>
	<table BORDER="1">
	<tr><th>Equipo</th><th>P</th><th>Puntos</th></tr>
	<?php  foreach ($clasificacion as $equipo ) {?>
	<tr>
	<td><?php echo $equipo['equipo'] ?></td>
	<td><?php echo $equipo['jugados'] ?></td>
	<td><?php echo $equipo['puntos'] ?></td>
	</tr>
	<?php } ?>
	</table>
	<br>
	<a href="controlador.php">Inicio</a>
	
	<?php
}

function print_inicio( )
{
	?>
	<h1>Inicio</h1>
	<a href="controlador.php?opcion=jornada">Jornada</a>
	<a href="controlador.php?opcion=clasificacion">Clasificacion</a>
	<?php
}
