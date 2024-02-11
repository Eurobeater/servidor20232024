<?php
//crear una cookie. nombre y valor de la cookie. la función time() toma en cuenta la hora del sistema para guardar la cookie. 30 es la duracion de la cookie. el tercer parametro es para establacer la ruta donde se va a guardar la cookie (solo la leera leerCoockie2.php)
setcookie("prueba", "Esta es la información de nuestra primera cookie", time() +30, "/servidor20232024/pruebasPildoras/cookies/zonaContenidos/");
?>