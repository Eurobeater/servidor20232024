<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="tratamientoSalario.php" method="POST" enctype="multipart/form-data">
        Nombre <input type="text" name="nombre" /><br/>
        Apellidos <input type="text" name="apellidos" /><br/>
        Salario <input type="text" name="salario" /><br/>

        <input type="submit" value="Enviar" /><br/>
        <input type="reset" value="Borrar" /><br/>
    </form>
</body>
</html>