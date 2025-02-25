<?php
    class CUsuarios{
        public $objModelo;
        public $vista;
        public $errores = [];
    
        public function __construct(){
            require_once(RUTA_MODELOS.'Usuarios.php'); 
            $this->objModelo = new MUsuarios();
        }
    
        public function iniciar(){
            //Mandar al modelo para comprobar si ya existen usuarios
            if ($this->objModelo->usuariosExistentes()) {
                //echo "Usuarios ya existen";
                $this->vista = 'inicio';
                return true; 
            } else {
                //Si no existen se insertan
                //echo "Usuarios no existen. Insertando y redirigiendo a inicio.";
                $this->objModelo->insertarUsuarios();
                $this->vista = 'inicio'; 
                return true; 
            }
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
            $usuario = $this->objModelo->validarUsuario($correo, $passw);
    
            if($usuario){
                //Iniciamos la sesion
                session_start();
                $_SESSION['idUsuario'] = $usuario['idUsuario'];
                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['correo'] = $usuario['correo'];
                $_SESSION['telefono'] = $usuario['telefono'];
    
                $this->vista = 'inicioUsuario';
                return true; 
            } else {
                $this->vista = 'inicio';
                $this->errores[] = "Usuario o contraseña incorrectos.";
                return ["errores" => $this->errores];
            }
        }

        //Mandar a la vista de la contraseña
        public function vistaPassw(){
            session_start();
            $this->vista = 'cambiarPassw';
            return true; 
        }

        //Metodo para controlar cambiar la contraseña
        public function cambiarPassw(){
            session_start();
            
            if (empty($_POST['correo']) || empty($_POST['passwAntigua']) || empty($_POST['nuevaPassw'])) {
                $this->errores[] = "Todos los campos son obligatorios.";
                $this->vista = 'cambiarPassw';
                return ["errores" => $this->errores];
            }
            
            //Guardar lo recogido por el formulario
            $correo = $_POST['correo'];
            $passwAntigua = $_POST['passwAntigua'];
            $nuevaPassw = $_POST['nuevaPassw'];
    
            $usuario = $this->objModelo->validarUsuario($correo, $passwAntigua);
    
            if ($usuario) {
                $this->objModelo->cambiarPassw($correo, $nuevaPassw);
                $this->vista = 'inicioUsuario'; 
                return true;
            } else {
                $this->errores[] = "La contraseña actual no es correcta.";
                $this->vista = 'cambiarPassw';
                return ["errores" => $this->errores];
            }
        }

        //Mandar a la vista para modificar datos
        public function vistaModificar(){
            session_start();
            $this->vista = 'modificarDatos';
            return true; 
        }

        //Metodo para controlar la modificación de datos
        public function modificarDatos(){
            session_start();
            if (!isset($_SESSION['idUsuario'])) {
                $this->errores[] = "No hay usuario identificado.";
                $this->vista = 'inicio';
                return ["errores" => $this->errores];
            }
        
            if (empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['telefono'])) {
                $this->errores[] = "Todos los campos son obligatorios.";
                $this->vista = 'modificarDatos';
                return ["errores" => $this->errores];
            }
        
            $idUsuario = $_SESSION['idUsuario'];
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];
        
            if ($this->objModelo->modificarUsuario($idUsuario, $nombre, $correo, $telefono)) {
                $_SESSION['nombre'] = $nombre;
                $_SESSION['correo'] = $correo;
                $_SESSION['telefono'] = $telefono;
                $this->vista = 'inicioUsuario';
                return true;
            } else {
                $this->errores[] = "Error al modificar los datos.";
                $this->vista = 'modificarDatos';
                return ["errores" => $this->errores];
            }
        }
        //Cerrar la sesion
        public function cerrarSesion(){
            session_start();
            session_destroy();//Destruir la sesion
            $this->vista = 'inicio';
            return true;
        }
    }
?>
