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
       $dia = 3;
       switch ($dia) {
        case 1:
            echo "El dia es lunes";
            break;
            
        case 2:
            echo "El dia es martes";
            break;

        case 3:
            echo "El dia es miércoles";
            break;

        default:
            echo "Hemos pasado la mitad de la semana";
            break;
       }
    ?>
</body>
</html>