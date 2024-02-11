<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo 'Variables pasadas mediante GET: <br/>';
        foreach ($_GET as $indice => $valor) {      //get recoge todas las variables que se pasen en la pagina web del script php
            echo "$indice : $valor <br/>";                  //  al escribir esto en la url del navegador se imprime los datos en pantalla ->  /getypost/recogidaGet.php?var1=Pedro&var2=Blanco&var3=20
        }
    ?>
</body>
</html>