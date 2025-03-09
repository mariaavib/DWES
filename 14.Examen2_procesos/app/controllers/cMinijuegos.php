<?php
    class CMinijuego{
        public $vista;
        public $objModelo;

        public function __construct(){
            require_once('models/mMinijuegos.php');
            $this->objModelo = new MMinijuegos();
        }
        
        public function listar_ambitos(){
            $this->vista = 'views/vListar_ambito.php';
            $ambitos = $this->objModelo->obtenerAmbitos();
            return $ambitos;
        }

        public function mostrarFormulario($id){
            $this->vista = 'views/modificar.php';
            return $this->objModelo->obtenerDatosAmbitos($id);     
        }

        public function modificarAmbito($id, $nombre){
            $this->objModelo->modificarAmbito($id, $nombre);
            header('Location: listar_ambitos.php');
        }

        public function mostrarFormularioAltas(){
            $this->vista = 'views/altas.php';
            $ambitos = $this->objModelo->obtenerAmbitos();
            return $ambitos;
        }

        public function comprobarNombreMinijuego($nombre){
            $this->vista = 'views/altas.php';
            $existe = $this->objModelo->comprobarNombre($nombre);
            return $existe;
        }

        public function alta_minijuego($nombre){
            $this->vista = 'views/altas.php';
            $this->objModelo->addMinijuego($nombre);
            header('Location: listar_ambitos.php');
        }


    }
?>