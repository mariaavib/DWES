<?php
    class ExtraerAmbitos{
        private $conexion;

        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        public function extraer(){
            //Consulta para seleccionar los ambitos 
            $sql = 'SELECT * FROM ambitos;';
            $resultado = $this->conexion->query($sql);    

            return $resultado;
        }
    }
?>