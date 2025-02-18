<?php
    class MUsuarios{
        private $conexion;

        public function __construct(){
            require_once('db.php');
            $objConexion = new Db();
            $this->conexion = $objConexion->conexion;
        }

        public function inicioUsuario(){
            $sql = 'SELECT correo,passw,perfil FROM usuario WHERE correo = (?)';
            $stmt = $this->conexion->prepare
        }
        
    }
?>