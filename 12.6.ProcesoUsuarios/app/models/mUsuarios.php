<?php
class MUsuarios {
    private $conexion;

    public function __construct(){
        require_once('db.php');
        $objConexion = new Db();
        $this->conexion = $objConexion->conexion;
    }

    public function insertarUsuarios(){
        $usuarios = [
            ['correo' => 'usuario1@gmail.com', 'passw' => '123456', 'nombre' => 'Celia Moruno', 'telefono' => '666200120'],
            ['correo' => 'usuario2@gmail.com', 'passw' => '78910', 'nombre' => 'Maria Vidigal', 'telefono' => '635724150'],
            ['correo' => 'usuario3@gmail.com', 'passw' => '111213', 'nombre' => 'Adriana Ramallo', 'telefono' => '692510478']
        ];

        // Preparamos la consulta SQL para insertar usuarios
        $sql = "INSERT INTO usuario (correo, passw, nombre, telefono) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);

        // Verificamos si la preparación de la consulta fue exitosa
        if ($stmt === false) {
            die('Error en la preparación de la consulta: ' . $this->conexion->error);
        }

        // Vinculamos los parámetros con la consulta (todos son strings: 'ssss')
        $stmt->bind_param('ssss', $correo, $passw, $nombre, $telefono);

        // Insertamos los usuarios
        foreach ($usuarios as $usuario) {
            $correo = $usuario['correo'];
            $passw = $usuario['passw'];
            $nombre = $usuario['nombre'];
            $telefono = $usuario['telefono'];

            // Ejecutamos la consulta con los valores correspondientes
            if (!$stmt->execute()) {
                die('Error al ejecutar la consulta: ' . $stmt->error);
            }
        }

        $stmt->close(); // Cerramos la sentencia preparada
        echo "Usuarios insertados correctamente.";
    }

    public function usuariosExistentes() {
        // Consulta para contar los usuarios existentes en la base de datos
        $sql = "SELECT COUNT(*) FROM usuario";
        $stmt = $this->conexion->prepare($sql); 
        $stmt->execute(); 
        $stmt->bind_result($numeroUsuarios); 
        $stmt->fetch(); 
        $stmt->close(); 
        if($resultado = $numeroUsuarios > 0)
            return true;
    }

    public function validarUsuario($correo,$passw){
        $sql = "SELECT * FROM usuario WHERE correo = ? AND passw = ?";
        $stmt = $this->conexion->prepare($sql);

        $stmt->bind_param('ss', $correo,$passw);

        $stmt->execute();

        //Obtener el resultado de la consulta
        $resultado = $stmt->get_result();

        if($resultado->num_rows > 0){
            $usuario = $resultado->fetch_assoc();  
            return $usuario;  
        } else {
            return false;  
        }
    }

    public function cambiarPassw($correo,$nuevaPassw){
        // Consulta SQL para actualizar la contraseña del usuario
        $sql = "UPDATE usuario SET passw = ? WHERE correo = ?";
        $stmt = $this->conexion->prepare($sql);

        // Vinculamos los parámetros con la consulta
        $stmt->bind_param('ss', $nuevaPassw, $correo);

        // Ejecutamos la consulta
        if ($stmt->execute()) {
            echo "Contraseña cambiada correctamente.";
        } else {
            die('Error al ejecutar la consulta: ' . $stmt->error);
        }

        // Cerramos la sentencia preparada
        $stmt->close();
    }

    public function modificarUsuario($idUsuario, $nombre, $correo, $telefono){
        $sql = "UPDATE usuario SET nombre = ?, correo = ?, telefono = ? WHERE idUsuario = ?";
        $stmt = $this->conexion->prepare($sql);
    
        $stmt->bind_param('sssi', $nombre, $correo, $telefono, $idUsuario);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
