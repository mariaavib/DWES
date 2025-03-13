<?php
    class CPreguntas{
        public $vista;
        public $objModelo;

        public function __construct() {
            require_once('models/mPreguntas.php');
            $this->objModelo = new MPreguntas();
        }

        public function mostrarFormulario(){
            $this->vista = 'views/vFormAlta.php';
            return true;
        }
        //Lo tenía public
        private function comprobarImg($rutaCarpeta, $tipoImagen){
            //Comprobar si ya existe la imagen
            if(file_exists($rutaCarpeta)){
                echo 'ya existe la imagen<br>';
                echo '<a href="pFormularioAlta.php">Volver</p>';
                return false;
            }

            $tiposImg = ['image/jpeg','image/png'];
            //var_dump($tipoImagen);
            if(!in_array($tipoImagen,$tiposImg)){
                echo 'Formato no permitido';
                echo '<a href="pFormularioAlta.php">Volver</p>';
                return false;
            }
            return true;
        }

        public function altaPregunta(){
            $numPregunta = $_POST['num'];
            $texto = $_POST['textoPregunta'];
            $imagen = $_FILES['imagen'];
            $respCorrecta = $_POST['letra'];
            $respuestas = $_POST['respuestas'];
            $tipoImagen = $imagen['type'];
            $nombreImg = $imagen['name'];
            $carpeta= 'assets/';
            $rutaCarpeta = $carpeta.basename($imagen['name']);
            //echo $nombreImg;
            //echo $numPregunta.'<br>';
            //echo $texto.'<br>';
            //print_r($respuestas);
            if($this->comprobarImg($rutaCarpeta,$tipoImagen)){
                if(move_uploaded_file($imagen['tmp_name'],$rutaCarpeta)){
                    $idPregunta = $this->objModelo->insertarPregunta($numPregunta,$texto,$nombreImg,$respCorrecta);
                    $this->objModelo->insertarRespuestas($idPregunta, $respuestas);
                    echo 'Insertada correctamente<br>';
                    echo '<a href="pFormularioAlta.php">Volver</p>';
                    //header('Location:pFormularioAlta.php');
                    }
                }
            }
            /*if($this->comprobarImg($rutaCarpeta,$tipoImagen)){
                $this->objModelo->insertar($numPregunta,$texto,$respCorrecta);
            }*/
        
    }
?>