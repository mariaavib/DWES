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

            if (isset($_POST["email"]) && isset($_POST["passw"])) {
                $correo = $_POST["email"];
                $password = $_POST["passw"];
    
                $datos = $this->objModelo->inicioUsuario($correo);
                //print_r($datos);
                if ($datos) {
                    if (password_verify($password,$datos['passw'])){                  
                        $_SESSION['usuario'] = $datos['correo']; 
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        }
    }
?>