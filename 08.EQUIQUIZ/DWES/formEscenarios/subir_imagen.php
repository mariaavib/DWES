<?php
    require_once("./config_db.php");

    class SubirImg {
        private $mysqli;
        public $ambito;
        public $imagen;

        public function __construct($mysqli) {
            $this->mysqli = $mysqli;
        }

        public function subirImagenes() {
            if (isset($_POST["ambito"]) && isset($_FILES["imagen"])) {
                // Guardar el ambito y la imagen en otras variables
                $this->ambito = $_POST["ambito"];
                $this->imagen = $_FILES["imagen"];

                $carpeta = "assets/";
                $rutaImagen = $carpeta . basename($this->imagen['name']); // Se utiliza para obtener el nombre del archivo de la imagen

                // Mover la imagen al directorio de destino
                if (move_uploaded_file($this->imagen["tmp_name"], $rutaImagen)) {
                    $consulta = "INSERT INTO Escenarios (ambito, rutaImagen) VALUES ('$this->ambito', '$rutaImagen')";
                    
                    $resultado = $this->mysqli->query($consulta);

                    if ($resultado) {
                        echo "Imagen guardada correctamente";
                    } else {
                        echo "Error al guardar la imagen";
                    }
                } else {
                    echo "Error al subir la imagen";
                }
            } else {
                echo "Datos de formulario incompletos";
            }
        }
    }
?>