<?php
class Procedimientos {
    private $mysqli;
    public $idCurso;
    public $nombre;
    public $isbn;
    public $titulo;
    public $clases;
    public $activo;
    public $resultado;
    public $cursoSeleccionado;

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
           $consulta = "SELECT libros.ISBN,libros.nombre AS titulo,clases.idCurso,clases.letraClase, reservas_libros.entregado
                        FROM libros
                        INNER JOIN reservas_libros 
                            ON  libros.ISBN = reservas_libros.ISBN
                        INNER JOIN reservas 
                            ON reservas_libros.idReserva = reservas.idReserva
                        INNER JOIN clases 
                            ON reservas.idCurso = clases.idCurso AND clases.idCurso = '".$this->cursoSeleccionado."'
		                        AND reservas.letraClase = clases.letraClase;";
            $resultado=$this->mysqli->query($consulta);
            if(!isset($resultado))
                throw new Exception("No hay libros para el curso seleccionado");   

            $this->resultado = true;
            for ($i = 0; $fila = $resultado->fetch_array(); $i++) {
                $this->isbn[$i] = $fila["ISBN"];
                $this->titulo[$i] = $fila["titulo"];
                $this->clases[$i] = $fila["idCurso"].' '.$fila["letraClase"];
                $this->activo[$i] = $fila["entregado"];
            }
        } catch (Exception $th) {
            $this->resultado = $th;
        } 
    }
    
    public function close() {
        $this->mysqli->close();
    }
}
?>