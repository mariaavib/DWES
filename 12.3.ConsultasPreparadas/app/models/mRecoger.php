<?php
    class MRecoger{
        private $conexion;

        public function __construct() {
            require_once('db.php');
            $objConexion = new Db();
            $this->conexion= $objConexion->conexion;
        }

        public function recogerAmbitos($nombreAmbito){
            //print_r($nombreAmbito);
            // Consulta SQL para insertar un nombre de ámbito en la tabla ambitos
            $sql = 'INSERT INTO ambitos(nombre) VALUES (?)';
            $stmt = $this->conexion->prepare($sql);// Analiza la consulta 
            $stmt->bind_param('s',$nombre);// Asigna el tipo que va a ser la variable string y el nombre de la variable

            // Recorre cada nombre de ámbito y ejecuta la consulta 
            foreach ($nombreAmbito as $nombre) {
                $stmt->execute();
            }
            
            $stmt->close();

            return true; 
        }

        // Método para verificar si un nombre de ámbito ya existe en la base de datos
        public function existeAmbito($nombre) {
            $sql = 'SELECT COUNT(*) FROM ambitos WHERE nombre = ?';

            $stmt = $this->conexion->prepare($sql);// Analizar la consulta
            $stmt->bind_param('s', $nombre);
            $stmt->execute();
            $stmt->bind_result($numAmbitos); // Vincula la variable $numAmbitos al resultado de la consulta
            $stmt->fetch(); // Obtiene el resultado de la consulta
            $stmt->close();
    
            if ($numAmbitos > 0) {
                return true; // Si el número de ámbitos es mayor que 0 quiere decir que ya existe
            } else {
                return false; // Si no hay ámbitos con ese nombre devolvemos false
            }
        }
    }
?>