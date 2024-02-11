<?php
// Incluir el modelo
require_once('libreria.php');
// Incluir el modelo
require_once('modelo.php');
// Incluir la presentacion
require_once('vista.php');


if (isset($_POST["submit"])) {
    $fechas = array();
    for ($date = time(), $i = 0; $i < 10; $i++, $date += 3600 * 24) {
        $fechas[] = date("d-m-Y", $date);
    }
    if (validateDate($_POST["fecha"], "d-m-Y") && in_array($_POST["fecha"], $fechas)) {
        $cartelera = getCartelera(fechaUSA($_POST["fecha"]));
        displayCartelera($cartelera, $_POST["fecha"]);
    } else
        displayError();
} else {
    $cartelera = getCartelera(date("Y-m-d"));
    displayCartelera($cartelera, date("d-m-Y"));
}
