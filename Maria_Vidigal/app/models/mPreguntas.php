<?php
    require_once('config/configdb.php');

    class MPreguntas{
        public $conexion;

        public function __construct() {
            $this->conexion = new MYSQLI(SERVIDOR,USSER,PASSW,BASEDATOS);
            if($this->conexion->connect_error){
                die("Error de conexion".$this->conexion->connect_error);
            }
        }

        public function insertarPregunta($numPregunta,$texto,$nombreImg,$respCorrecta){
            $sql = 'INSERT INTO preguntas(numPregunta, textoPregunta, imagenRespuesta, respuestCorrecta) 
                        VALUES (?,?,?,?)';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param('isss', $numPregunta,$texto,$nombreImg,$respCorrecta);
            $stmt->execute();
            /*$sql='INSERT INTO preguntas(numPregunta, textoPregunta, imagenRespuesta, respuestCorrecta) 
                VALUES ($numPregunta, $texto, null, null)';
            $resultado = $this->conexion->query($sql);*/
            //Metodo del modelo que obtiene el id de la pregunta pasandole el numPregunta
            $idPregunta = $this->obtenerIdPregunta($numPregunta);
            return $idPregunta;
        }

        private function obtenerIdPregunta($numPregunta){
            //Consulta para obtener el id de la pregunta insertada, lo he puesto privado porque solo lo uso desde el modelo
            $sql = 'SELECT idPregunta FROM preguntas WHERE numPregunta = ?';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param('i', $numPregunta);
            $stmt->execute();
            $resultado = $stmt->get_result();
            //Si la consulta devuelve alguna fila que guarde el id de la pregunta
            if($fila = $resultado->fetch_assoc()){
                $idPregunta = $fila['idPregunta'];
            }
            return $idPregunta;
        }

        public function insertarRespuestas($idPregunta, $respuestas){
            $sql = 'INSERT INTO respuestas(idPregunta, letraRespuesta, textoRespuesta)
                    VALUES (?,?,?) ';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param('iss', $idPregunta, $letra, $texto);
            //Recorrer el array cada elemento del array respuestas, que tiene la letra como indice y el texto el valor, 
            // es igual que el ejercicio que hicimos de insertar varios ambitos
            foreach($respuestas as $letra => $texto){
                $stmt->execute();
            }
        }


    }
?>