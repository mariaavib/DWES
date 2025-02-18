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
            $stmt->bind_param('s', $correo);  //Decir el tipo de dato que es y asignarle la variable $correo
            $stmt->execute(); //Ejecutar consulta
            $result = $stmt->get_result(); //Obtener el resultado de la consulta
            // Verificar si se encontraron filas en el resultado
            if($result->num_rows>0){
                return $result->fetch_assoc(); //Devolver la fila como un array asociativo
            }
        }
    }
?>