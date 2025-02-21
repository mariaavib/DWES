<?php
    class CUsuarios{
        public $objModelo;
        public $vista;

        public function __construct(){
            require_once(RUTA_MODELOS.'Usuarios.php'); 
            $this->objModelo = new MUsuarios();
        }

        public function inicio(){
            $this->vista = 'inicio';
            return true;
        }

        public function inicioSesion(){
            if (empty($_POST['correo']) || empty($_POST['passw'])) {
                $this->errores[] = "Todos los campos son obligatorios.";
                $this->vista = 'inicio';
                return ["errores" => $this->errores];
            }
            //Recoger los datos del formulario y mandar a la vista
            $correo = $_POST['correo'];
            $passw = $_POST['passw'];
            $this->vista = 'inicioUsuario';

            //Validamos el usuario en el modelo y le pasamos el correo y la contraseña
            $usuario = $this->objModelo->inicioUsuario($correo, $passw);
            //echo "Entra en inicio";
            if($usuario){
                //print_r($usuario);
                //echo "Entra en usuario";
                $this->vista = 'inicioUsuario';
                return true; 
            } else {
                $this->vista = 'inicio';
                $this->errores[] = "Usuario o contraseña incorrectos.";
                return ["errores" => $this->errores];
            }
        }
    }
?>