<?php
    class CMinijuegos{
        public $vista;
        public $objModelo;

        public function __construct() {
            require_once('models/mMinijuegos.php');
            $this->objModelo = new MMinijuegos();
        }

        public function gestMinijuegos(){
            $this->vista = 'views/vGestionMinijuegos.php';
            $minijuegos = $this->objModelo->obtenerMinijuegos();
            //var_dump($minijuegos);
            return $minijuegos;
        }

        public function mostrarFormuAdd(){
            $this->vista = 'views/vAddMinijuego.php';
            $ambitos = $this->objModelo->obtenerAmbitos();
            return $ambitos;
        }

        public function addMinijuego() {
            // Verificar si el formulario se envió con los datos necesarios
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nombre = $_POST['nombre'];
                $idAmbito = $_POST['idAmbito'];
                $imagen = $_FILES['imagen'];
        
                // Variable para controlar si todo está correcto
                $correcto = 1;
        
                // Verificar si el nombre, el ámbito y la imagen no están vacíos
                if (empty($nombre) || empty($idAmbito) || empty($imagen['name'])) {
                    echo "<p style='color:red;'>Por favor, rellene todos los campos obligatorios.</p>";
                    $correcto = 0;  // Cambiar a 0 si hay un error
                }
        
                // Si el nombre y el ámbito son correctos, proceder con la verificación de la imagen
                if ($correcto == 1) {
                    // Subir la imagen a la carpeta 'assets/imgMinijuegos/'
                    $carpeta = 'assets/imgMinijuegos/';
                    $ruta = $carpeta . $_FILES['imagen']['name'];
        
                    // Verificar si el archivo ya existe
                    if (file_exists($ruta)) {
                        echo "<p style='color:red;'>El archivo ya existe.</p>";
                        $correcto = 0;  
                    }
        
                    // Verificar el tamaño del archivo (500KB máximo)
                    if ($imagen['size'] > 500000) { 
                        echo "<p style='color:red;'>El archivo es demasiado grande.</p>";
                        $correcto = 0;  
                    }
                }
        
                // Si no hay errores proceder con la subida del archivo
                if ($correcto == 1) {
                    // Mover el archivo a la carpeta de destino
                    if (move_uploaded_file($imagen['tmp_name'], $ruta)) {
                        // Insertar el minijuego en la base de datos con el nombre y la ruta de la imagen
                        $this->objModelo->insertarMinijuego($nombre, $idAmbito, $ruta);
                        
                        // Redirigir al proceso de gestión de minijuegos
                        header('Location: gestion_minijuegos.php');
                    } else {
                        echo "<p style='color:red;'>No se ha subido el archivo.</p>";
                        $correcto = 0;  
                    }
                }
        
                //Si hay errores mostrar un boton para volver al proceso que muestra el formulario
                if ($correcto == 0) {
                    echo "<a href='mostrarFormAltas.php'>Volver</a>";
                }
            }
        }      
        
        public function mostrarFormuModif($idMinijuego){
            // print_r($idMinijuego);
            $this->vista = 'views/vModifMinijuego.php';
            $minijuego = $this->objModelo->obtenerMinijuegoId($idMinijuego);
            return $minijuego;
        }

        public function modificarMinijuego(){
            // Recogemos los datos del formulario
            $idMinijuego = $_POST['id'];  
            $nombre = $_POST['nombre'];   
            $imagen = $_FILES['imagen'];  
            // Variable para controlar si todo está correcto
            $correcto = 1;

            // Validar que el nombre no esté vacío
            if (empty($nombre)) {
                echo "<p style='color:red;'>El nombre no puede estar vacío.</p>";
                $correcto = 0;  
            }

            // Si no hay errores verificamos la imagen
            if ($correcto == 1) {
                // Si se ha subido una nueva imagen verificamos su validez
                if ($imagen['error'] == 0) {
                    // Subir la imagen a la carpeta 'assets/imgMinijuegos/'
                    $carpeta = 'assets/imgMinijuegos/';
                    $ruta = $carpeta . basename($imagen['name']);
                
                    // Verificar si el archivo ya existe
                    if (file_exists($ruta)) {
                        echo "<p style='color:red;'>El archivo ya existe.</p>";
                        $correcto = 0;  
                    }
                
                    // Verificar el tamaño del archivo (500KB máximo)
                    if ($imagen['size'] > 500000) { 
                        echo "<p style='color:red;'>El archivo es demasiado grande.</p>";
                        $correcto = 0;  
                    }

                    // Si todo es correcto, mover el archivo a la carpeta de destino
                    if ($correcto == 1 && move_uploaded_file($imagen['tmp_name'], $ruta)) {
                        // Llamamos a la función para actualizar el minijuego en la base de datos
                        $this->objModelo->actualizarMinijuego($idMinijuego, $nombre, $ruta);
                        header('Location: gestion_minijuegos.php'); // Redirigir a la gestión de minijuegos
                    } else {
                        echo "<p style='color:red;'>No se ha subido el archivo </p>";
                        $correcto = 0;  // Cambiar a 0 si hay un error en la subida
                    }
                } else {
                    // Obtener la imagen actual del minijuego desde la base de datos
                    $minijuego = $this->objModelo->obtenerMinijuegoId($idMinijuego);  // Asumiendo que esta función obtiene el minijuego por ID

                    // Aquí estamos tomando la ruta de la imagen actual del minijuego
                    $rutaImagen = $minijuego['imagen'];  // 'imagen' es el campo de la ruta de la imagen en la base de datos

                    // Actualizamos el minijuego sin cambiar la imagen
                    $this->objModelo->actualizarMinijuego($idMinijuego, $nombre, $rutaImagen);
                    echo "Minijuego modificado correctamente.";
                    header('Location: gestion_minijuegos.php');
                }
            }

            // Si hubo un error, mostrar un botón para volver al formulario de modificación
            if ($correcto == 0) {
                echo "<a href='mostrarFormModif.php?id=$idMinijuego'>Volver</a>";
            }
        }

        public function eliminarMinijuego($idMinijuego){
            $this->objModelo->deleteMinijuego($idMinijuego);
            header('Location: gestion_minijuegos.php');
        }
    }
?>  