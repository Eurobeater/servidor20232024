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
    //se recojen las variables por el POST enviado desde formularioSalario.php
    $nom = $_POST['nombre'];
    $ape = $_POST['apellidos'];
    $sal = $_POST['salario'];

    //enviar datos por pantalla
    echo "El usuario " . $nom . " " . $ape . " cobra " . $sal . " €";
    //asignar al formulario los valores
    ?>

    <form action="tratamientoSalario.php" method="POST" enctype="multipart/form-data">
        Nombre <input type="text" name="nombre" value="<?php echo $nom; ?>" /><br />        <!-- Se abren y se cierran las etiquetas de php en cada campo para poder imprimir cada valor en los metodos 'value' para simular un formulario de modificacion de datos -->
        Apellidos <input type="text" name="apellidos" value="<?php echo $ape; ?>" /><br/>
        Salario <input type="text" name="salario" value="<?php echo $sal; ?>" /><br />
        F.actual <input type="text" name="hoy" value="<?php echo date("d/m/Y"); ?>" /><br /> <!-- Se ha añadido un campo mas para mostrar la fecha y hora actual -->
    </form>
    <a href="tratamientoSalarioGet.php?nombre=<?php echo $nom;?>
           &apellidos=<?php echo $ape;?>&salario=<?php echo $sal;?>">
           ver datos pasados por GET</a>
</body>
</html>