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
        
        //Obtener los ambitos
        public function obtenerAmbitos(){
            $sql = 'SELECT * FROM ambito';
            $resultado = $this->conexion->query($sql);

            $ambitos=[];
            while($fila = $resultado->fetch_assoc()){
                $ambitos[]=$fila;
            }

            return $ambitos;
        }

        //Obtener datos del ambito seleccionado
        public function obtenerDatosAmbitos($id){
            $sql = 'SELECT * FROM ambito WHERE idambito=?';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $resultado = $stmt->get_result();
            return $resultado->fetch_assoc();
        }

        //Modificar ambito
        public function modificarAmbito($id,$nombre){
            $sql = 'UPDATE ambito SET nombre = ? WHERE idambito = ?';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param('si', $nombre, $id);
            $stmt->execute();
        }

        //Comprobar si existe el nombre
        public function comprobarNombre($nombre){
            $sql = 'SELECT COUNT(*) FROM minijuegos WHERE nombre = ?';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param('s', $nombre);
            $stmt->execute();
            $stmt->bind_result($resultado);
            $stmt->fetch();
            return $resultado > 0;
        }

        //Añadir minijuego
        public function addMinijuego($nombre){
            $sql = 'INSERT INTO minijuegos(nombre) VALUES (?)';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param('s', $nombre);
            $stmt->execute();
        }
    }
?>