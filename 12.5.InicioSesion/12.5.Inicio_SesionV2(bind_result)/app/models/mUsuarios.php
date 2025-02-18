<?php
    class MUsuarios{
        private $conexion;

        public function __construct(){
            require_once('db.php');
            $objConexion = new Db();
            $this->conexion = $objConexion->conexion;
        }

        public function inicioUsuario($correo){
            //Consulta select para seleccionar el correo y la contraseña
            $sql = 'SELECT correo,passw FROM usuario WHERE correo = (?)';
            $stmt = $this->conexion->prepare($sql); //Analizar la consulta una sola vez
            $stmt->bind_param('s', $correo); //Decir el tipo de dato que es y asignarle la variable $correo
            $stmt->execute(); //Ejecutar consulta
            $stmt->bind_result($correo,$passw); //Vincula las variables a los resultados de la consulta
            $stmt->fetch(); //Obtiene los resultados de la consulta
            return array('correo'=>$correo, 'passw'=>$passw); //Devuelve los resultados como un array asociativo
        }
    }
?>