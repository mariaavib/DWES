<?php
    class MUsuario{
        private $conexion;
        
        public function __construct() {
            require_once('db.php');
            $objConexion = new Db();
            $this->conexion = $objConexion ->conexion;
        }

        public function insertar(){
            $usuarios = [
                ['correo' => 'usuario1@gmail.com', 'passw' => '0000', 'nombre' => 'Celia', 'telefono' => '666200120'],
                ['correo' => 'usuario2@gmail.com', 'passw' => '0000', 'nombre' => 'Maria', 'telefono' => '635724150'],
                ['correo' => 'usuario3@gmail.com', 'passw' => '0000', 'nombre' => 'Adriana', 'telefono' => '692510478']
            ];

            $sql = "INSERT INTO usuario(correo,passw,nombre,telefono) VALUES (?,?,?,?)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param('sssi',$correo, $passw, $nombre, $telefono);
            foreach($usuarios as $usuario){
                $correo = $usuario['correo'];
                $passw = $usuario['passw'];
                $nombre = $usuario['nombre'];
                $telefono = $usuario['telefono'];
                $stmt->execute();
            }
            $stmt->close();
            return true;
        }

        public function validarUsuario($correo,$passw){
            $sql = "SELECT * FROM usuario WHERE correo = ? AND passw = ?";
            $stmt = $this->conexion->prepare($sql);

            $stmt->bind_param('ss',$correo,$passw);

            $stmt->execute();

            $resultado = $stmt->get_result();

            if($resultado->num_rows > 0){
                $usuario = $resultado->fetch_assoc();
                return $usuario;
            }else{
                return false;
            }
        }

        public function obtenerPassw($correo){
            $sql = "SELECT passw FROM usuario WHERE correo = ?";
            $stmt = $this->conexion->prepare($sql);

            $stmt->bind_param('s', $correo);

            $stmt->execute();
            $resultado = $stmt->get_result(); 
            $usuario = $resultado->fetch_assoc(); 

            $stmt->close();
        
            return $usuario;
        }

        public function cambiarPassw($correo,$passw){
            $sql = "UPDATE passw FROM usuario WHERE correo = ?";
            $stmt = $this->conexion->prepare($sql);

            $stmt->bind_param('s', $correo);

            $stmt->execute();

            $stmt->close();
            return true;
        }


    }
?>