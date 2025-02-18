<?php
    class Extraer{
        private $conexion;
        
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        public function extraer(){
            //Extraer los ambitos
            $sql = 'SELECT * FROM ambitos;';
            $resultado = $this->conexion->query($sql);

            return $resultado;
        }
    }
?>