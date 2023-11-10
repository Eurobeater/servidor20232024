<?php
// Incluir el modelo
require_once('libreria.php');
// Incluir el modelo
require_once('modelo.php');
// Incluir la presentacion
require_once('vista.php');

$cartelera = getCartelera();

displayCartelera($cartelera);


?>