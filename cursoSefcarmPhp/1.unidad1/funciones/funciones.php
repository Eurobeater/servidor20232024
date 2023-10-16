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
     
    $dni=1; $correo="2"; $numeroEntero=3;

    //devuelve verdadero si la variable es existe
    isset($dni);
    //destruye el nombre y contenido liberando memoria
    unset($dni);
    //devuelve el tipo de dato de la variable
    gettype($correo);
    //convierte el tipo de dato de la variable al tipo especificado
    settype($dni, "integer");
    //comprueba si la variable esta vacia, no existe o su valor es null
    empty($dni);
    ?>
</body>
</html>