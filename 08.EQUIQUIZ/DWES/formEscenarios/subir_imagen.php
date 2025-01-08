<?php
    require_once("./config_db.php");

    class SubirImg {
        private $mysqli;

        public function __construct($mysqli) {
            $this->mysqli = $mysqli;
        }

        public function eleccionEscenario() {    
            $consulta = "SELECT rutaImagen FROM escenarios WHERE ambito='Educación';";
            $resultado = $this->mysqli->query($consulta);

            if ($resultado && $resultado->num_rows > 0) {
                $fila = $resultado->fetch_assoc();
                return $fila["rutaImagen"];
            } else { 
                return null;
            }
        }
    }

?>