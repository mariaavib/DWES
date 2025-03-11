<?php
    //Porque si pongo 'config/configdb.php'
    require_once(CONFIG.'configdb.php');

    class MMinijuegos{
        private $conexion;

        public function __construct() {
            $this->conexion = new MYSQLI(SERVIDOR,USSER,PASSW,BASEDATOS);
            if($this->conexion->connect_error){
                die("Error de conexion".$this->conexion->connect_error);
            }
        }

        //Obtener minijuegos
        public function obtenerMinijuegos(){
            $sql = 'SELECT * FROM minijuegos';
            $resultado = $this->conexion->query($sql);
            $minijuegos = []; 
            while($fila = $resultado->fetch_assoc()){
                $minijuegos [] =$fila;
            }
            return $minijuegos;
        }

        //ObtenerAmbitos
        public function obtenerAmbitos(){
            $sql = 'SELECT * FROM ambitos';
            $resultado = $this->conexion->query($sql);
            $ambitos = [];
            while($fila = $resultado->fetch_assoc()){
                $ambitos [] = $fila;
            }
            return $ambitos;
        }

        //ObtenerAmbitos
        public function obtenerMinijuegoId($id){
            $sql = 'SELECT * FROM ambitos WHERE $idMinijuego = ?';
            $stmt;
            $ambitos = [];
            while($fila = $resultado->fetch_assoc()){
                $ambitos [] = $fila;
            }
            return $ambitos;
        }

        //Insertar minijuego
        public function altaMinijuego(){
            $sql = 'INSERT INTO minijuegos(nombre,idAmbito,imagen) VALUES ()';
        }
    }

?>