<?php
    class MAmbitos{
        private $conexion;

        public function __construct() {
            require_once('db.php');
            $objConexion = new Db();
            $this->conexion= $objConexion->conexion;
        }

        public function cogerAmbitos(){
            $sql = 'SELECT * FROM ambitos';
            $resultado = $this->conexion->query($sql);

            return $resultado;
        }

        public function cogerMinijuegos($ambitosSeleccionados){
            $datos = []; //Array para almacenar los ámbitos y sus minijuegos

            if(!empty($ambitosSeleccionados)){
                foreach ($ambitosSeleccionados as $idAmbito){
                    //Obtener el nombre del ámbito
                    $sql = "SELECT nombre FROM ambitos WHERE idAmbito = $idAmbito";
                    $resultado = $this->conexion->query($sql);

                    if($ambito = $resultado->fetch_array()){
                        $nombreAmbito = $ambito['nombre'];

                        //Obtener los minijuegos del ámbito
                        $sql2 = "SELECT nombre FROM minijuegos WHERE idAmbito = $idAmbito";
                        $resultado2 = $this->conexion->query($sql2);

                        //Guardar el nombre de los minijuegos en un array
                        $minijuegos = [];
                        while ($minijuego = $resultado2->fetch_array()) {
                            $minijuegos[] = $minijuego['nombre'];
                        }

                        //Guardar el ámbito y sus minijuegos en el array
                        $datos[] = [
                            'ambito' => $nombreAmbito,
                            'minijuegos' => $minijuegos
                        ];
                    }
                }
            }
            echo '<br>';
            print_r($datos);
            echo '<br><br>';
            return $datos;
        }
    }
?>