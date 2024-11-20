<?php
class Procedimientos {
    private $mysqli;
    public $idCurso;
    public $nombre;
    public $isbn;
    public $titulo;
    public $clases;
    public $activo;

    public function __construct($servidor, $usuario, $contraseña, $basedatos) {
        $this->mysqli = new mysqli($servidor, $usuario, $contraseña, $basedatos);

        if ($this->mysqli->connect_error) {
            die("Error de conexión: " . $this->mysqli->connect_error);
        }
    }

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

    public function librosPorCurso() {
        $consulta = "SELECT libros.ISBN,libros.nombre AS titulo,clases.idCurso,clases.letraClase, reservas_libros.entregado
                        FROM libros
                        INNER JOIN reservas_libros 
                            ON  libros.ISBN = reservas_libros.ISBN
                        INNER JOIN reservas 
                            ON reservas_libros.idReserva = reservas.idReserva
                        INNER JOIN clases 
                            ON reservas.idCurso = clases.idCurso AND clases.idCurso = '".$_POST['clases']."'
		                        AND reservas.letraClase = clases.letraClase;";

        $resultado=$this->mysqli->query($consulta);
        for ($i = 0; $fila = $resultado->fetch_array(); $i++) {
            $this->isbn[$i] = $fila["ISBN"];
            $this->titulo[$i] = $fila["titulo"];
            $this->clases[$i] = $fila["idCurso"].' '.$fila["letraClase"];
            $this->activo[$i] = $fila["entregado"];
        }
    }

    public function borrar(){
        $consulta = 'DELETE FROM libros WHERE isbn='.$_POST["isbn"].';';
        $resultado = $mysqli->query($consulta);

        if($resultado){
            echo "Libro borrado correctamente";
        }else{
            echo "Error";
        }

        header("Location:gestionLibros.php");
    }
    
    public function close() {
        $this->mysqli->close();
    }
}
?>