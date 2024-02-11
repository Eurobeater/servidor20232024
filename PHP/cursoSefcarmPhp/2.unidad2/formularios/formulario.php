<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="tratamiento.php" method="POST" enctype="multipart/form-data">
        Nombre <input type="text" name="nombre" /><br/>
        Apellidos <input type="text" name="apellidos" /><br/>
        F. Nacimiento <input type="date" name="fecha_nacimiento" /><br/>

        Sexo <br/>
            <input type="radio" name="sexo" value="hombre">Hombre<br/>
            <input type="radio" name="sexo" value="mujer">Mujer<br/>

        Idiomas<br/>
            <input type="checkbox" name ="idioma1" value="inglés"/>Inglés 
            <input type="checkbox" name ="idioma2" value="francés"/>Francés 
            <input type="checkbox" name ="idioma3" value="aleman"/>Aleman<br/>
        
        Turno preferente
            <select name="turno">
                <option value="mañana">Mañana</option>
                <option value="tarde">Tarde</option>
                <option value="noche">Noche</option>
            </select> <br/>

        Observaciones <textarea name="observaciones" cols="45" rows="6"></textarea> <br>

        Foto <input type="file" name="foto"><br/>

        <input type="submit" value="Enviar"><br/>
        <input type="reset" value="Borrar"><br/>
    </form>
</body>
</html>