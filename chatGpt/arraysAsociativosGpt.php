<?php
$exploradores = array("explorador1" => "Chrome", "explorador2" => "Firefox", "explorador3" => "Safari");

// Mostrar cada elemento del array asociativo
echo("Mostrar cada elemento del array asociativo <br><br>");

echo "Explorador 1: " . $exploradores["explorador1"] . "<br>";
echo "Explorador 2: " . $exploradores["explorador2"] . "<br>";
echo "Explorador 3: " . $exploradores["explorador3"] . "<br>";
echo("<br><br>");

//usando foreach
echo("Usando foreach <br><br>");

foreach ($exploradores as $key => $value) {
    echo "Clave: " . $key . ", Valor: " . $value . "<br>";
}

//lo que se muestra en pantalla
//Clave: explorador1, Valor: Chrome
//Clave: explorador2, Valor: Firefox
//Clave: explorador3, Valor: Safari
?>