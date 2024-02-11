<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <?php
        //estableciendo la conexion. Se obtiene el descriptor de la base de datos, en el fichero 'conexion.php'. para eso hacemos referencia al fichero, porque contiene los datos de la conexion
        include('conexion.php');

        //crear una sentencia SQL que se guardará en una variable
        $sql="select * from productos";

        //ejecutar la consulta SQL, se pasa como parametro el descriptor que hay en conexion.php y la sentencia SQL guardada previamente en una variable. el resultado se guarda en un array, esta vez se guarda en variable.
        $resultado =  mysqli_query($descriptor, $sql);      //devuelve false si el usuario no esta autorizado a acceder a las tablas

        //crear un bucle para recorrer el array con el resultado de la ejecucion. cuando llega a la ultima fila (no hay mas) devuelve 'false'. mysqli_fetch_array devuelve un array que corresponde a la fila recuperada. de lo contrario devuelve 'false'.
        while ($row = mysqli_fetch_array($resultado)) {
            echo $row['codigo']. "<br/>";                       //se asigna al array devuelto por la funcion una variable llamada 'row' hasta que devuelva 'false' el bucle. 
            echo $row['producto']. "<br/>";
            echo $row['detalle']. "<br/>";
            echo $row['precio']. "<br/>";
            echo $row['descuento']. "<br/>";
            echo "<img src='" .$row['imagen']. "'>'" . "<br/>";
        }
    ?>
</body>
</html>