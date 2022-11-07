<?php 

    abstract class Usuario{
        protected $nombreUsuario;
        protected $contra;

        public abstract function mostrarDatos();
    }

    class Alumno extends Usuario{

        private $matricula;
        private $nombre;
        private $apellido;

        public function __construct($matricula){
            $this->matricula = $matricula;
        }

        public function setNombreUsuario($nombre){
            $this->nombreUsuario = $nombre;
        }
        public function setContra($contra){
            $this->contra = $contra;
        }
        public function setMatricula($mat){
            $this->matricula = $mat;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function setApellido($apellido){
            $this->apellido = $apellido;
        }

        public function getNombreUsuario(){
            return $this->nombreUsuario;
        }
        public function getContra(){
            return $this->contra;
        }
        public function getMatricula(){
            return $this->matricula;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function getApellido(){
            return $this->apellido;
        }

        public function mostrarDatos(){
            echo "<br> Matricula: " .$this->matricula;
            echo "<br> Nombre: " .$this->nombre;
            echo "<br> Apellido: " .$this->apellido;
            echo "<br> Nombre de Usuario: " .$this->nombreUsuario;
            echo "<br> Contraseña: " .$this->contra;
        }
    }

    // mostrar datos

    $alumno = new Alumno(123);
    $alumno->setNombreUsuario('juancito');
    $alumno->setContra('juan123');
    $alumno->setNombre('Juan');
    $alumno->setApellido('Perez');
    $alumno->mostrarDatos();
?>