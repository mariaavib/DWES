<?php
    require_once("./config_db.php");

    class SubirImg {
        private $mysqli;
        public $escenario1;

        public function __construct($mysqli) {
            $this->mysqli = $mysqli;
        }

        public function eleccionEscenario() {    
            $consulta = "SELECT rutaImagen FROM escenarios WHERE ambito='Educación';";
            $resultado = $this->mysqli->query($consulta);
            if($resultado){
                echo '<img src='.$resultado.'alt="Escenario 1">';
            }else{
                echo "No existe imagen";
            }
            
        }
    }
?>