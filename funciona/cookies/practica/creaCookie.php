<?php
setcookie("idiomaSeleccionado", $_GET["idioma"], time() +1200);
header("Location:verCookie.php");           //crea la cookie y redirige a verCookie.php, que hará que dependiendo del valor de la cookie, se muestre la página en español o en inglés
?>