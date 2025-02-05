<?php
    class MAmbitos{
        private $conexion;

        public function __construct() {
            require_once('db.php');
            $objConexion = new Db();
            $this->conexion= $objConexion->conexion;
        }

        public function cogerAmbitos(){
            $sql = 'SELECT * FROM ambitos';
            $resultado = $this->conexion->query($sql);

            return $resultado;
        }

        public function cogerMinijuegos($ambitosSeleccionados){
            SELECT minijuegos.nombre AS nombreMinijuego, ambitos.nombre AS nombreAmbitos 
FROM minijuegos
INNER JOIN ambitos 
	ON minijuegos.idAmbito = ambitos.idAmbito;
        }
    }
?>