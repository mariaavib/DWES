<?php
    require_once('config/configdb.php');

    class MMinijuegos{
        private $conexion;

        public function __construct() {
            $this->conexion = new MYSQLI(SERVIDOR,USSER,PASSW,BASEDATOS);
            if($this->conexion->connect_error){
                die("Error de conexion".$this->conexion->connect_error);
            }
        }    

        public function obtenerMinijuegos(){
            $sql = 'SELECT * FROM minijuegos';
            $resultado = $this->conexion->query($sql);
            $minijuegos = [];
            while($fila = $resultado->fetch_assoc()){
                $minijuegos [] = $fila;
            }
            return $minijuegos;
        }

        public function obtenerAmbitos(){
            $sql = 'SELECT * FROM ambitos';
            $resultado = $this->conexion->query($sql);
            $ambitos = [];
            while($fila = $resultado->fetch_assoc()){
                $ambitos [] = $fila;
            }
            return $ambitos;
        }

        public function obtenerMinijuegoId($id){
            $sql = 'SELECT * FROM minijuego WHERE idMinijuego = ?';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
        }


        public function obtenerMinijuegoAmbitos($idMinijuego){
            $sql = 'SELECT minijuegos.*, ambitos.nombre AS nombreAmbito, ambitos.idAmbito
                    FROM minijuegos
                        INNER JOIN ambitos ON minijuegos.idAmbito = ambitos.idAmbito
                            WHERE minijuegos.idMinijuego = ?';

            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param('i', $idMinijuego);
            $stmt->execute();
            $resultado = $stmt->get_result();
            return $resultado->fetch_assoc();
        }
    }

?>