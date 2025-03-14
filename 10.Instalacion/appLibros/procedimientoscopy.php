<?php
class Procedimientos {
    private $mysqli;
    public $idCurso;
    public $cursoSeleccionado;
    public $idEditorial;
    public $idAsignatura;
    public $nombreEdit;
    public $nombreAsign;


    public function __construct($servidor, $usuario, $contraseña, $basedatos) {
        $this->mysqli = new mysqli($servidor, $usuario, $contraseña, $basedatos);

        //Verificar si hay errores de conexión
        if ($this->mysqli->connect_error) {
            die("Error de conexión: " . $this->mysqli->connect_error);
        }

        //Asignar el curso seleccionado 
        if(!empty($_POST["clases"]))
            $this->cursoSeleccionado = $_POST["clases"]; 
    }

    //Método para obtener los cursos
    public function cursos(){
        $consulta = "SELECT idCurso,nombre FROM cursos";
        $resultado=$this->mysqli->query($consulta);

        if ($resultado) {
            for ($i = 1; $fila = $resultado->fetch_array(); $i++) {
                $this->idCurso[$i] = $fila["idCurso"];
                $this->nombre[$i] = $fila["nombre"];
            }
        } else {
            die("Error en la consulta: " . $this->mysqli->error);
        }
    }
    //Método para obtener los libros por curso
    public function librosPorCurso() {
        try {
           $consulta = "SELECT libros.ISBN, libros.nombre AS titulo, clases.idCurso, clases.letraClase, reservas_libros.entregado AS activo
                        FROM libros
                        INNER JOIN reservas_libros 
                            ON libros.ISBN = reservas_libros.ISBN
                        INNER JOIN reservas 
                            ON reservas_libros.idReserva = reservas.idReserva
                        INNER JOIN clases 
                            ON reservas.idCurso = clases.idCurso AND clases.idCurso = '".$this->cursoSeleccionado."'
                            AND reservas.letraClase = clases.letraClase;";
            $resultado = $this->mysqli->query($consulta);
            if (!$resultado)
                throw new Exception("No hay libros para el curso seleccionado");   

            return $resultado;

        } catch (Exception $th) {
            $this->resultado = $th;
        } 
        
    }
    public function obtenerEditoriales(){
        $consulta = "SELECT idEditorial, nombre FROM editoriales";
        $resultado=$this->mysqli->query($consulta);

        if ($resultado) {
            for ($i = 1; $fila = $resultado->fetch_array(); $i++) {
                $this->idEditorial[$i] = $fila["idEditorial"];
                $this->nombreEdit[$i] = $fila["nombre"];
            }
        } else {
            die("Error en la consulta: " . $this->mysqli->error);
        }
    }

    public function obtenerAsignaturas(){
        $consulta = "SELECT idAsignatura, nombre FROM asignaturas";
        $resultado=$this->mysqli->query($consulta);

        if ($resultado) {
            for ($i = 1; $fila = $resultado->fetch_array(); $i++) {
                $this->idAsignatura[$i] = $fila["idAsignatura"];
                $this->nombreAsign[$i] = $fila["nombre"];
            }
        } else {
            die("Error en la consulta: " . $this->mysqli->error);
        }
    }

    public function close() {
        $this->mysqli->close();
    }
}
?>