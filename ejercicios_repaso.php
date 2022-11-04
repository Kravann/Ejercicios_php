<?php
    // PRIMER EJERCICIO 
    
    // CREAR FUNCIONES 
    // CREAR UNA CLASE 
    // VINCULACION CON BASE DE DATOS 

    // SEGUNDO EJERCICIO

    // HERENCIA
    // MODIFICADORES DE ACCESIBILIDAD (protected, private, public)
    // GETERS Y SETTERS  funciones publicas para atributos privados o protegidos
    // getNombre() retorna la varibale, serNombre() lo toma como parametro pero no lo retorna
    // CLASE ABSTRACTAS
    // METODOS ABSTRACTOS
    //Los métodos setters son aquellos que permiten modificar el valor de una propiedad. Por lo general estos reciben un parámetro con el nuevo valor de la propiedad y no devuelven nada. Al igual que los getters, estos métodos suelen crearse un por cada propiedad a la cual es posible cambiarle el valor, sin embargo también hay programadores usan uno  para modificar varias propiedades con un array de parámetro. Yo tampoco hago esto último

    function conectar(){
        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "personas";

        $c = mysqli_connect($server, $user, $pass, $database);
        return $c;
    }

    // CLASE ABSTRACTA
    abstract class Persona{
        protected $name;
        protected $last_name;
        protected $document;

        public function __construct($name, $last_name, $document){
            $this -> name = $name;
            $this -> last_name = $last_name;
            $this -> document = $document;
        }

        // Getters para atributos PRIVADOS y PROTEGIDOS
        // Cuando un atributo es privado, no lo podemos acceder directamente como cuando son publicos, por lo tanto es necesario tener una manera de poder accederlos, para esto hacemos una funcion publica que nos retorne o muestre el atributo.

        public function getNombre(){
            return $this -> nombre;
        }

        public function getApellido(){
            return $this -> apellido;
        }

        public function getDni(){
            return $this -> dni ;
        }

        // Setters para atributos PRIVADOS Y PROTEGIDOS

        public function setNombre($entrada){
            $this -> nombre = $entrada;
        }

        public function setApellido($entrada){
            $this -> apellido = $entrada;
        }

        public function setDni($entrada){
            $this -> dni = $entrada;
        }

        public function show_all(){
            echo "Nombre: ".$this -> name."<br>";
            echo "Apellido: ".$this -> last_name."<br>";
            echo "Nro de documento: ".$this -> document."<br>";
        }

        public function access_how_i_am(){
            self::how_i_am();
        }

        private function how_i_am(){
            echo "Soy ".$this -> name;
        }

        // abstract static function search($tem){}
    }

    class Cliente extends Persona{
        protected $direction;
        protected $phone;

        // sobreescribo el construct
        public function __construct($name, $last_name, $document, $direction, $phone){
            parent::__construct($name, $last_name, $document);
            $this -> direction = $direction;
            $this -> phone = $phone;
        }

        public function show_all(){
            parent::show_all();
            echo "Dirección: ".$this -> direction."<br>";
            echo "Télefono: ".$this -> phone."<br>";
        }

        public function how_i_am(){
            parent::self::how_i_am();
        }

        static function search($tem){}
    }

    class Empleado extends Cliente{
        protected $antiguedad;
        protected $sueldo;

        public function __construct($name, $last_name, $document, $direction, $phone, $antiguedad, $sueldo){
            parent::__construct($name, $last_name, $document, $direction, $phone);
            $this -> sueldo = $sueldo;
            $this -> antiguedad = $antiguedad;
        }

        public function dar_alta(){
            mysqli_query(conectar(),"INSERT INTO empelados VALUES ('$this->nombre','$this->apellido',$this->dni,'$this->direccion','$this->telefono',$this->sueldo,'$this->sueldo')");
        }

        static function search($tem){}

    }

    // entender mejor la interaccion de la base de datos

    class Producto{
        protected $modelo;
        protected $marca;
        protected $precio;

        public function __construct($modelo,$marca,$precio){
            $this -> modelo = $modelo;
            $this -> marca = $marca;
            $this -> precio = $precio;
        }

        public function dar_alta_producto(){
            $conn = conectar();
            $sql = "INSERT INTO productos VALUES ('$this->modelo','$this->marca', $this->precio";

            mysqli_query($conn, $sql);

            if(mysqli_affected_rows($conn) > 0){
                echo "Se cargaron los datos";
                
            }else{
                echo "No se cargaron los datos";
            }
        }

        static function search_by_name($product){
            $conn = conectar();
            $sql = "SELECT * FROM productos WHERE nombre = $product";

            $result = mysqli_query($conn, $sql);

            if(mysqli_affected_rows($conn) > 0){
                self::listarProcuto($result);
            }else{
                echo "No se encontro a $product en la base de datos"; 
            }
        }

        private static function to_list_by_product($result){
            while($data = mysqli_fetch_assoc($result)){
                echo "Modelo : ".$data["modelo"];
                echo "Marca : ".$data["marca"];
                echo "Precio : ".$data["precio"];
            }
        }
    }

?>