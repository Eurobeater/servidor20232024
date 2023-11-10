<?php
// Incluir el modelo
require_once('libreria.php');
// Incluir el modelo
require_once('modelo.php');
// Incluir la presentacion
require_once('vista.php');


if (isset($_GET["CURSO_ID"])) {
    $tutor = getTutor( $_GET["CURSO_ID"]);
   
    $profesorado = getProfesorado($_GET["CURSO_ID"]);
    displayProfesorado($tutor, $profesorado);
    
} else {
    $cursos = getCursos();
    displayCursos($cursos);
}
