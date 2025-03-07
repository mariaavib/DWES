<?php
    require_once('config/configdb.php');

    class MMinijuegos{
        private $conexion;

        public function __construct(){
            $this->conexion = new mysqli(SERVIDOR, USSER, PASSW, BASEDATOS);
            if($this->conexion->connect_error){
                die("Error de conexion: ".$this->conexion->connect_error);
            }
        }

        public function obtenerAmbitos(){
            $sql = 'SELECT * FROM ambito';
            $resultado = $this->conexion->query($sql);

            $ambitos=[];
            while($fila = $resultado->fetch_assoc()){
                $ambitos[]=$fila;
            }

            return $ambitos;
        }
    }
?>