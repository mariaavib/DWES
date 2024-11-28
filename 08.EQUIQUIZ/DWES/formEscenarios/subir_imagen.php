<?php
    require_once("./config_db.php");

    class SubirImg {
        private $mysqli;

        public function __construct($mysqli) {
            $this->mysqli = $mysqli;
        }

        public function verImagen($fila){
            echo '<img src="../'.$fila.'"alt="Educacion">';
        }

        public function eleccionEscenario() {    
            
            $consulta = "SELECT rutaImagen FROM escenarios WHERE ambito='Educación';";
            
            $resultado = $this->mysqli->query($consulta);
            $fila=$resultado->fetch_assoc();
            
            return $fila["rutaImagen"];
        }
    }

?>