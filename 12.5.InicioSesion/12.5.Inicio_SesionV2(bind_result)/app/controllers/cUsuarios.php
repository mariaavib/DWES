<?php
    class CUsuarios{
        public $objModelo;
        public $vista;

        public function __construct(){
            require_once(RUTA_MODELOS.'Usuarios.php'); 
            $this->objModelo = new MUsuarios();
        }

        public function inicio(){
            $this->vista = 'inicio'; //Vista del formulario

            //Si existe email y password la guardo en una variable y envio al modelo inicioUsuario el correo
            if (isset($_POST["email"]) && isset($_POST["passw"])) {
                $correo = $_POST["email"];
                $password = $_POST["passw"];
    
                $datos = $this->objModelo->inicioUsuario($correo);
                //print_r($datos);
                if ($datos) {
                    //Verificar la contraseña
                    if (password_verify($password,$datos['passw'])){
                        //Aqui se guardaria en $_SESSION el correo despues de verificar la contraseña                
                        $_SESSION['usuario'] = $datos['correo']; 
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }
        }
    }
?>