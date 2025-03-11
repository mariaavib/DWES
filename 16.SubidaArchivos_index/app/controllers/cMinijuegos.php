<?php
    class CMinijuegos{
        public $vista;
        public $objModelo;

        public function __construct() {
            require_once(RUTA_MODELO.'Minijuegos.php');
            $this->objModelo = new MMinijuegos();
        }

        //Metodo por defecto
        public function inicio(){
            $this->vista = 'vGestionMinijuegos.php';
            $minijuegos = $this->objModelo->obtenerMinijuegos();
            return $minijuegos;
        }

        //Vista para mostrar el formulario de añadir
        public function formMinijuego(){
            $this->vista = 'vAddMinijuego.php';
            $ambitos = $this->objModelo->obtenerAmbitos();
            return $ambitos;
        }

        public function addMinijuego(){
            $idAmbito = $_POST['idAmbito']; 
            $nombre = $_POST['nombre'];
            $img = $_FILES['imagen'];
            $correcto = 1;

            // Verificar si el nombre, el ámbito y la imagen no están vacíos
            if (empty($nombre) || empty($imagen['name'])) {
                echo "<p style='color:red;'>Rellene todos los campos obligatorios.</p>";
                $correcto = 0;  
            }

            if($correcto == 1){
                // Subir la imagen a la carpeta 'assets/imgMinijuegos/'
                $carpeta = 'assets/imgMinijuegos/';
                $ruta = $carpeta . $_FILES['imagen']['name'];

                if(file_exists($ruta)){
                    echo '<p>Ya existe</p>';
                    $correcto = 0;
                }
            }

            if($correcto == 1){
                if(move_uploaded_file($img['tmp_name'],$ruta)){
                    $this->objModelo->altaMinijuego($idAmbito, $nombre, $img);
                    //header('Location: index.php?c=Minijuego&m=inicio');
                }else{
                    echo '<p>Hay un error</p>';
                    $correcto = 0;
                }
            }
        }

        public function formModificar(){
            $nombre = $_GET['nombre'];
            $id = $_GET['id'];
            $this->objModelo->obtenerMinijuegoId($id);
            return true;
        }

        public function borrar(){

        }
    }
?>