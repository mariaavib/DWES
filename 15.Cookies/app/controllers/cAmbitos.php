<?php
    class CAmbitos{
        public $objModelo;
        public $vista;

        public function __construct() {
            require_once(RUTA_MODELOS.'Ambitos.php');
            $this->objModelo = new MAmbitos();
        }

        //Vista principal que envia al modelo
        public function inicio(){
            $this->vista = 'formulario';
            $datos =  $this-> objModelo -> cogerAmbitos();    
            return $datos;
        }

        //Vista que envia al modelo y le pasa como parametro un array
        public function mostrar(){
            $this->vista = 'mostrarMinijuegos';

            if(!isset($_POST['terminos'])){
                $this->errores[] = "Debes aceptar los términos";
            }

            if(!isset($_POST['ambitos'])){
                $this->errores[] = "Debes seleccionar al menos un ámbito";
            }

            if(!empty($this->errores)){
                $this->vista = 'formulario';
                $datos = $this -> objModelo -> cogerAmbitos();
                return ['errores' => $this->errores, 'datos' => $datos];
            }

            $datos = $this -> objModelo -> cogerMinijuegos($_POST['ambitos']);
            return $datos;
        }

        //Vista que muestra el minijuego seleccionado, no es necesario enviar a la vista
        public function minijuegoSeleccionado(){
            // Eliminar cookies anteriores (por si el navegador no actualiza correctamente)
            setcookie("minijuego_nombre", "", time() - 3600, "/");
            setcookie("minijuego_url", "", time() - 3600, "/");
        
            // Verificar que los valores de GET existen antes de establecer cookies
            if(isset($_GET['nombre']) && isset($_GET['url'])) {
                setcookie("minijuego_nombre", $_GET['nombre'], time() + 3600, "/");
                setcookie("minijuego_url", $_GET['url'], time() + 3600, "/");
        
                // Redirigir para asegurar que las cookies se reflejen en la siguiente carga
                header("Location: index.php?c=Ambitos&m=mostrar");
                exit();
            } else {
                echo "Error: No se recibieron los datos del minijuego.";
                exit();
            }
        }
    }
?>