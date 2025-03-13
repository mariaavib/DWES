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
            return $minijuegos;
        }

        public function mostrarFormuAdd(){
            $this->vista = 'views/vAddMinijuego.php';
            $ambitos = $this->objModelo->obtenerAmbitos();
            return $ambitos;
        }

        public function addMinijuego() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nombre = $_POST['nombre'];
                $idAmbito = $_POST['idAmbito'];
                $imagen = $_FILES['imagen'];

                $correcto = 1;

                // Validación
                if (empty($nombre) || empty($idAmbito) || empty($imagen['name'])) {
                    $error_message = "Por favor, rellene todos los campos obligatorios.";
                    $correcto = 0;
                }

                if ($correcto == 1) {
                    // Verificación de tipo de archivo
                    $tiposPermitidos = ["image/jpeg", "image/png", "image/jpg"];
                    if (!in_array($imagen['type'], $tiposPermitidos)) {
                        $error_message = "El tipo de archivo no es válido. Solo se permiten imágenes JPEG, PNG o GIF.";
                        $correcto = 0;
                    }

                    // Ruta del archivo
                    $carpeta = 'assets/imgMinijuegos/';
                    $ruta = $carpeta . $_FILES['imagen']['name'];

                    // Verificación si el archivo ya existe
                    if (file_exists($ruta)) {
                        $error_message = "El archivo ya existe.";
                        $correcto = 0;
                    }

                    // Verificar el tamaño
                    if ($imagen['size'] > 500000) {
                        $error_message = "El archivo es demasiado grande.";
                        $correcto = 0;
                    }
                }

                // Subir el archivo si todo es correcto
                if ($correcto == 1) {
                    if (move_uploaded_file($imagen['tmp_name'], $ruta)) {
                        // Insertar en la base de datos
                        $this->objModelo->insertarMinijuego($nombre, $idAmbito, $ruta);

                        // Redirigir sin salida previa
                        header('Location: gestion_minijuegos.php');
                        exit;
                    } else {
                        $error_message = "No se ha subido el archivo.";
                        $correcto = 0;
                    }
                }

                if ($correcto == 0) {
                    // Mostrar mensaje de error y permitir regresar al formulario
                    echo "<p style='color:red;'>{$error_message}</p>";
                    echo "<a href='mostrarFormAltas.php'>Volver</a>";
                }
            }
        }

        public function mostrarFormuModif($idMinijuego){
            $this->vista = 'views/vModifMinijuego.php';
            $minijuego = $this->objModelo->obtenerMinijuegoAmbitos($idMinijuego);
            $ambitos = $this->objModelo->obtenerAmbitos();
            $data = [
                'minijuego' => $minijuego,
                'ambitos' => $ambitos
            ];

            include($this->vista);
        }

        public function modificarMinijuego() {
            $correcto = 1;
            $idMinijuego = $_POST['id'];
            $nombre = $_POST['nombre'];
            $imagen = $_FILES['imagen'];

            if (empty($nombre)) {
                $error_message = "El nombre no puede estar vacío.";
                $correcto = 0;
            }

            // Obtener imagen actual
            $minijuego = $this->objModelo->obtenerMinijuegoId($idMinijuego);
            $rutaImagenActual = $minijuego['imagen'];

            if ($imagen['error'] == 0) {
                $carpeta = 'assets/imgMinijuegos/';
                $rutaNueva = $carpeta . basename($imagen['name']);

                // Verificación si el archivo ya existe
                if (file_exists($rutaNueva)) {
                    $error_message = "El archivo ya existe.";
                    $correcto = 0;
                }

                if ($imagen['size'] > 500000) {
                    $error_message = "El archivo es demasiado grande.";
                    $correcto = 0;
                }

                if ($correcto == 1 && move_uploaded_file($imagen['tmp_name'], $rutaNueva)) {
                    // Eliminar la imagen anterior
                    if (file_exists($rutaImagenActual)) {
                        unlink($rutaImagenActual);
                    }

                    // Actualizar base de datos
                    $this->objModelo->actualizarMinijuego($idMinijuego, $nombre, $rutaNueva);

                    // Redirigir sin salida previa
                    header('Location: gestion_minijuegos.php');
                    exit;
                } else {
                    $error_message = "No se ha podido subir la nueva imagen.";
                    $correcto = 0;
                }
            } else {
                // Si no hay nueva imagen, mantener la actual
                $this->objModelo->actualizarMinijuego($idMinijuego, $nombre, $rutaImagenActual);

                // Redirigir sin salida previa
                header('Location: gestion_minijuegos.php');
                exit;
            }

            if ($correcto == 0) {
                // Mostrar mensaje de error y permitir regresar al formulario
                echo "<p style='color:red;'>{$error_message}</p>";
                echo "<a href='mostrarFormModif.php?id=$idMinijuego'>Volver</a>";
            }
        }

        public function eliminarMinijuego($idMinijuego){
            $minijuego = $this->objModelo->obtenerMinijuegoId($idMinijuego);
            $rutaImagen = $minijuego['imagen'];

            // Validar si la ruta de la imagen es válida antes de eliminarla
            if (!empty($rutaImagen) && file_exists($rutaImagen)) {
                unlink($rutaImagen);
            }

            $this->objModelo->deleteMinijuego($idMinijuego);

            // Redirigir sin salida previa
            header('Location: gestion_minijuegos.php');
            exit;
        }
    }
?>
