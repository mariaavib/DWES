<?php
    require_once('config/configdb.php');

    class MMinijuegos{
        private $conexion;

        public function __construct() {
            $this->conexion = new mysqli(SERVIDOR, USSER, PASSW, BASEDATOS);
            if($this->conexion->connect_error){
                die("Error de conexion: ".$this->conexion->connect_error);
            }
        }

        public function obtenerMinijuegos(){
            $sql = 'SELECT * FROM minijuegos';
            $resultado = $this->conexion->query($sql);

            $minijuegos = [];
            while($fila=$resultado->fetch_assoc()){
                $minijuegos[] = $fila;
            }
            return $minijuegos;
        }

        public function obtenerMinijuegoId($id){
            $sql = 'SELECT * FROM minijuegos WHERE idMinijuego = ?';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $resultado = $stmt->get_result();
            return $resultado->fetch_assoc();
        }

        public function obtenerAmbitos() {
            $sql = 'SELECT * FROM ambitos';
            $resultado = $this->conexion->query($sql);
            $ambitos = [];
            while ($fila = $resultado->fetch_assoc()) {
                $ambitos[] = $fila;
            }
            return $ambitos;
        }

        public function insertarMinijuego($nombre, $idAmbito, $imagen) {
            $sql = 'INSERT INTO minijuegos (nombre, idAmbito, imagen) VALUES (?, ?, ?)';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param('sis', $nombre, $idAmbito, $imagen);
            $stmt->execute();
        }

        public function actualizarMinijuego($id, $nombre, $imagen) {
            $sql = "UPDATE minijuegos SET nombre = ?, imagen = ? WHERE idMinijuego = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param('ssi', $nombre, $imagen, $id);
            $stmt->execute();
        }


        public function deleteMinijuego($idMinijuego){
            $sql = "DELETE FROM minijuegos WHERE idMinijuego = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("i", $idMinijuego);
            $stmt->execute();
        }
    }

?>