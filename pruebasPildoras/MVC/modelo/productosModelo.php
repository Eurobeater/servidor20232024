<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<style>body {text-align: center; margin-left: 20px;} table, tr, td, th {border: solid;}</style>

<?php
//Archivo para gestionar la tabla de productos (extraer la información) de la base de datos X
    class productosModelo {
        private $db;                                 //variables encapsuladas (private). $db almacena la conexión (que luego se usara con this->db)
        private $productos;                          //almacenar los productos de la tabla productos. posteriormente se guardara en un array y no en una variable, para no hacer 40 variables

        public function __construct() {                 //cuando se instancie la clase productosModelo, se llama al constructor. el constructor se encarga de conectar con la base de datos
            require_once("conexion.php");               //funciona como el require. solo que para evitar ejecuciones duplicados, se ejecuta una sola vez en el caso de que lo encuentre. si se repite, PHP lo omite y no genera errores
            $this->db=Conexion::conexion();             //ESTO ANTES HA DADO UN ERROR. SI NO FUNCIONA HAY QUE VERIFICAR
            $this->productos=array();                   //hay que especificar que la variable $productos que es un array, no en una variable. para almacenar todo en un array
        }

        public function getProductos() {                                    //getProductos. devuelve los productos que hay en la tabla productos
            $consulta = $this->db->query("SELECT * FROM productos");        //en un array se guarda la consulta de los productos

            while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $this->productos[]=$filas;
            }
            return $this->productos;
        }
    }
?>