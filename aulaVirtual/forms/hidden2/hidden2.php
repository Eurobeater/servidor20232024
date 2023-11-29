
<form method="post" action="hidden3.php">
	<input type="hidden" name="opcion" value="paso3" >
	<?php 
	printf('<input type="hidden" name="nombre" value="%s" ) >', $_POST[ 'nombre' ]);
	?>
	
	<label for=”apellidos”>Apellidos</label>
	<input type="text" name="apellidos">	
	<input type="submit">
</form>