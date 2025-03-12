<?php
    class MAmbitos{
        private $conexion;

        public function __construct() {
            require_once('db.php');
            $objConexion = new Db();
            $this->conexion= $objConexion->conexion;
        }

        //Consulta que selecciona los ambitos
        public function cogerAmbitos(){
            $sql = 'SELECT * FROM ambitos';
            $resultado = $this->conexion->query($sql);

            return $resultado;
        }

        public function cogerMinijuegos($ambitosSeleccionados){
            $datos = []; // Array para almacenar los ámbitos y sus minijuegos
            for($i = 0; $i < count($ambitosSeleccionados); $i++){
                //Consulta que selecciona el nombre del minijuego, la url y el nombre del ambito
                $sql = "SELECT minijuegos.nombre AS nombreMinijuego,minijuegos.imagen AS urlMinijuego , ambitos.nombre AS nombreAmbito 
                FROM minijuegos 
                INNER JOIN ambitos ON ambitos.idAmbito = minijuegos.idAmbito
                WHERE ambitos.idAmbito =".$ambitosSeleccionados[$i].";";
            
                $resultado = $this->conexion->query($sql);
            
                if($resultado){
                    //Array que va guardando el nombre del minijuego y la url
                    while($fila = $resultado->fetch_array()){
                        $datos[$fila['nombreAmbito']][] = [
                            'nombreMinijuego' => $fila["nombreMinijuego"],
                            'urlMinijuego' => $fila["urlMinijuego"],
                        ]; 
                    }
                }   
            }
            return $datos;    
        }
    }
?>