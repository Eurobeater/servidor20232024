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
       echo 'Variables pasadas mediante POST: <br/>';
       foreach ($_POST as $indice => $valor) {      //post recupera todas los datos del formulario que hay en 'formularioPost.php', pasandolas a este script php. 
           echo "$indice : $valor <br/>";           //ahora, las variables no apareceran en la url sino en el 'recogidaPost.php'. los campos son enviados desde formularioPost.php a recogidaPost.php
       }
    ?>
</body>
</html>