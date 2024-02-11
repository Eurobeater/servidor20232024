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
        // recojo variables
        $nom =$_GET['nombre'];
        $ape =$_GET['apellidos'];
        $sal =$_GET['salario'];
        
        //envio datos por pantalla
        echo "El usuario ".$nom." ".$ape." cobra ".$sal. " €";
        //asigno al formulario los valores
    ?>
</body>
</html>