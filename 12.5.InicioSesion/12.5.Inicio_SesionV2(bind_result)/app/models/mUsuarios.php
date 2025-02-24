<?php
    class MUsuarios{
        private $conexion;

        public function __construct(){
            require_once('db.php');
            $objConexion = new Db();
            $this->conexion = $objConexion->conexion;
        }

        public function inicioUsuario($correo, $passw) {
            // Consulta SELECT para seleccionar el correo y la contraseña
            $sql = 'SELECT correo, passw FROM usuario WHERE correo = ? AND passw = ?';
            $stmt = $this->conexion->prepare($sql); // Analizar la consulta una sola vez
        
            // Vincula las variables $correo y $passw a los parámetros de la consulta
            $stmt->bind_param('ss', $correo, $passw);
        
            $stmt->execute(); // Ejecutar la consulta
        
            // Vincula las columnas de la consulta con las variables
            $stmt->bind_result($correo, $passw); 
        
            if ($stmt->fetch()) {
                $resultado = array('correo' => $correo, 'passw' => $passw);
                return $resultado;
            } else {
                return null; 
            }
        }
        
    }
?>