<?php
    class MAmbitos{
        private $conexion;

        public function __construct() {
            require_once('db.php');
            $objConexion = new Db();
            $this->conexion= $objConexion->conexion;
        }

        public function cogerAmbitos(){
            $datos = [];
            $sql = 'SELECT * FROM ambitos';
            $resultado = $this->conexion->query($sql);
            while($fila = $resultado->fetch_array()){
                $datos[] = [ 
                    'idAmbito' => $fila['idAmbito'],
                    'nombre'   => $fila['nombre']
                ];                                 
            }
            return $datos;
        }

        public function cogerMinijuegos($ambitosSeleccionados){
            //print_r($ambitosSeleccionados);
            $datos = []; //Array para almacenar los ámbitos y sus minijuegos
            for($i = 0; $i <  count($ambitosSeleccionados); $i++){
                $sql = "SELECT minijuegos.nombre AS nombreMinijuego, ambitos.nombre AS nombreAmbito FROM minijuegos INNER JOIN ambitos ON ambitos.idAmbito = minijuegos.idAmbito WHERE ambitos.idAmbito =".$ambitosSeleccionados[$i].";";
          
                $resultado = $this->conexion->query($sql);

                if($resultado){
                    while($fila = $resultado->fetch_array()){
                        $datos[$fila['nombreAmbito']][] = $fila['nombreMinijuego']; 
                    }
                }   
            }
            //print_r($datos);
            return $datos;    
        }
    }
?>