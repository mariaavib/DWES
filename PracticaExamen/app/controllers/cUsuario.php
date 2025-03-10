<?php
    class CUsuario{
        public $objModelo;
        public $vistas;
        public $errores = [];
        public $nombre;
        public $telefono;

        public function __construct(){
            require_once(RUTA_MODELOS.'Usuario.php');
            $this->objModelo = new MUsuario();
        }

        public function predeterminada(){
            $this->vistas = 'formulario';
            return true;
        }
        
        public function inicioSesion(){
            if(empty($_POST['correo'] || empty($_POST['passw']))){
                $this->errores[] = "Todos los campos son obligatorios";
                $this->vista = 'formulario';
                return ["errores" => $this->errores];
            }

            $correo = $_POST['correo'];
            $passw = $_POST['passw'];
            $this->vistas = 'inicioUsuario';

            $usuario = $this->objModelo->validarUsuario($correo,$passw);

            if($usuario){
                session_start();
                $_SESSION['idUsuario'] = $usuario['idUsuario'];
                $_SESSION['correo'] = $usuario['correo'];
                $this->nombre = $usuario['nombre'];
                $this->telefono = $usuario['telefono'];

                $this->vista = 'inicioUsuario';
                return true;
            } else {
                $this->vista = 'formulario';
                $this->errores[] = "Usuario o contraseña incorrectos";
                return ["errores" => $this->errores];
            }
        }

        public function vistaPassw(){
            session_start();

            $this->vistas = 'cambiarPassw';
            return true;
        }

        public function cambiarPassw() {
            session_start();
        
            if (!isset($_POST['correo'], $_POST['passwAntigua'], $_POST['nuevaPassw'])) {
                $this->vistas = 'cambiarPassw';
                return;
            }
        
            $correo = $_POST['correo'];
            $passwAntigua = $_POST['passwAntigua'];
            $nuevaPassw = $_POST['nuevaPassw'];
        
            // Obtener la contraseña actual del usuario
            $passw = $this->objModelo->obtenerPassw($correo);
        
            if ($passw === null) { // Si el usuario no existe
                $this->vistas = 'cambiarPassw';
                return;
            }
        
            if ($passwAntigua === $passw) { // Comparación en texto plano
                $this->objModelo->cambiarPassw($correo, $nuevaPassw);
                $this->vistas = 'inicioSesion';
            } else {
                $this->vistas = 'cambiarPassw';
            }
        
        }
        public function vistaModificar(){
            session_start();
            $this->vistas = 'modificarDatos';
            return true;
        }

    }
?>