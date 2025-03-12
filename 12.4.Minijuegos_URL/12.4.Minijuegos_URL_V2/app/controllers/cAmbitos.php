<?php
    class CAmbitos{
        public $objModelo;
        public $vista;

        public function __construct() {
            require_once(RUTA_MODELOS.'Ambitos.php');
            $this->objModelo = new MAmbitos();
        }

        public function inicio(){
            $this->vista = 'formulario';
            $datos =  $this-> objModelo -> cogerAmbitos();    
            return $datos;
        }

        public function mostrar(){
            $this->vista = 'mostrarMinijuegos';
        
            // Validación en PHP
            if (empty($_POST['ambitos']) || !isset($_POST['terminos'])) {
                echo "<h2>Error en el formulario</h2>";
                
                if (empty($_POST['ambitos'])) {
                    echo "<p>Debes seleccionar al menos un ámbito.</p>";
                }
            
                if (!isset($_POST['terminos'])) {
                    echo "<p>Debes aceptar los términos y condiciones.</p>";
                }
            
                // Botón para volver al formulario
                echo "<br><a href='index.php' style='display:inline-block; padding:10px 20px; background-color:#007BFF; color:white; text-decoration:none; border-radius:5px;'>Volver</a>";
                exit;
            }
        
            // Si la validación es correcta, se envían los datos al modelo
            $datos = $this->objModelo->cogerMinijuegos($_POST['ambitos']);
            return $datos;
        }
    }
?>