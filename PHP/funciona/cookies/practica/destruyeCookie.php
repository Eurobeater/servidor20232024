<?php
setcookie("idiomaSeleccionado", "es", time() -1);       //destruir la cookie en español
setcookie("idiomaSeleccionado", "en", time() -1);       //destruir la cookie en inglés
header("Location:pag1.php");
?>