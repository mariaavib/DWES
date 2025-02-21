<?php
    class MUsuarios{
        private $conexion;

        public function __construct(){
            require_once('db.php');
            $objConexion = new Db();
            $this->conexion = $objConexion->conexion;
        }

        public function inicioUsuario($correo,$passw){
            //Consulta select para seleccionar el correo y la contraseña
            $sql = "SELECT * FROM usuario WHERE correo = ? AND passw = ?";
            $stmt = $this->conexion->prepare($sql);//Analizar la consulta una sola vez

            $stmt->bind_param('ss', $correo,$passw);//Decir el tipo de dato que es y asignarle la variable $correo

            $stmt->execute();//Ejecutar consulta

            //Obtener el resultado de la consulta
            $resultado = $stmt->get_result();

            if($resultado->num_rows > 0){
                $usuario = $resultado->fetch_assoc();  
                return $usuario;  
            } else {
                return false;  
            }
        }
    }
?>