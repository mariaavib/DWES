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
            $result = $stmt->get_result();
            if($result->num_rows>0){
                return $result->fetch_assoc();
            }
        }
    }
?>