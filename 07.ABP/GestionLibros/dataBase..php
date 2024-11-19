<?php
class Database {
    private $mysqli;

    public function __construct($servidor, $usuario, $contraseña, $basedatos) {
        $this->mysqli = new mysqli($servidor, $usuario, $contraseña, $basedatos);

        if ($this->mysqli->connect_error) {
            die("Error de conexión: " . $this->mysqli->connect_error);
        }
    }

    public function LibrosPorCurso($idCurso) {
        $consulta = "SELECT libros.ISBN,libros.nombre,clases.nombre,reservas_libros.entregado 
                    FROM Libros 
                    INNER JOIN Libros_Cursos  ON libros.ISBN = libros_cursos.ISBN INNER JOIN clases_asignaturas  ON libros.idAsignatura = clases_asignaturas.idAsignatura
                    INNER JOIN clases ON clases_asignaturas.idCurso = clases.idCurso AND clases_asignaturas.letraClase = clases.letraClase
                    INNER JOIN reservas_libros ON libros.ISBN = reservas_libros.ISBN;";
        

        
    }

    public function close() {
        $this->mysqli->close();
    }
}
?>