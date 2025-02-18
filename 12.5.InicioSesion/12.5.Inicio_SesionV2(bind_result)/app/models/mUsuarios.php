<?php
    class MUsuarios{
        private $conexion;

        public function __construct(){
            require_once('db.php');
            $objConexion = new Db();
            $this->conexion = $objConexion->conexion;
        }

        public function inicioUsuario($correo){
            $sql = 'SELECT correo,passw FROM usuario WHERE correo = (?)';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param('s', $correo); 
            $stmt->execute();
            $stmt->bind_result($correo,$passw);
            $stmt->fetch();
            return array('correo'=>$correo, 'passw'=>$passw);
        }
    }
?>