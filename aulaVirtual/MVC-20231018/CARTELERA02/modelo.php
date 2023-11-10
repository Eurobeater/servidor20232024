<?php

require "db.php";

function getCartelera( $fecha )
{


	$result = $GLOBALS['DB']->prepare( "select cartelera_cines.CINE AS CINE, cartelera_salas.SALA AS SALA, cartelera_peliculas.TITULO AS TITULO, cartelera_pases.HORA AS HORA from cartelera_pases, cartelera_peliculas, cartelera_clasificaciones,cartelera_cines, cartelera_salas where cartelera_cines.CINE_ID = cartelera_salas.CINE_ID and cartelera_peliculas.CLASIFICACION_ID = cartelera_clasificaciones.CLASIFICACION_ID and cartelera_pases.SALA_ID = cartelera_salas.SALA_ID and cartelera_pases.PELICULA_ID = cartelera_peliculas.PELICULA_ID and cartelera_pases.fecha = ? order by cartelera_cines.CINE, cartelera_salas.SALA, cartelera_peliculas.TITULO, cartelera_pases.HORA");
	
	$result->bindParam(1, $fecha );
	$result->execute();
	$cartelera = $result->fetchAll();
	return $cartelera;

}


?>