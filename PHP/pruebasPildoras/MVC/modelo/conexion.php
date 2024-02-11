<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<style>body {text-align: center; margin-left: 20px;} table, tr, td, th {border: solid;}</style>

<?php
//Archivo para gestionar la conexión de la base de datos y diferir los datos a la base de datos

class Conexion {
    //usamos un método estático para utilizar solo el nombre de la clase para llamar al metodo. ya que el metodo pertenece a la clase
    public static function conexion() {
        $dsn = "mysql:dbname=mvcPildoras";
        $username = "root";
        $password = "";

        $conexion = new PDO( $dsn, $username, $password );
        $conexion->exec("");                   // Utilizar prepare para preparar la consulta. prepare() permite la ejecución de consultas preparadas para evitar inyección SQL
        //$resultado = $conexion->query($sql);      no se usa en los logins

        if ($conexion === false) {
            echo "No se ha podido conectar a la base de datos";
            return null;
        }
        return $conexion;
    }
}

?>