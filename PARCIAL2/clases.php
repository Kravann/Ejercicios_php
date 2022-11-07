<?php 

    function conectar(){
        $conectar = mysqli_connect("localhost","root","","parcial2");
        return $conectar;
    }

    function consultar($conexion,$consulta){
        $resulset = mysqli_query($conexion,$consulta);
        return $resulset;
    }

    class Producto{

        private $id;
        private $descripcion;
        private $precio;

        public function __construct($descripcion,$precio){
            $this->descripcion = $descripcion;
            $this->precio = $precio;
        }

        public function mostrar(){
            echo $this->descripcion;
            echo $this->precio;
        }

        public function darDeAlta(){
            $con = conectar();
            $sql = "insert into productos (descripcion,precio) values ('$this->descripcion',$this->precio);";
            mysqli_query($con,$sql);
            if(mysqli_affected_rows($con) > 0){
                echo "<br><br>Producto guardado correctamente";
            }else{
                echo "<br><br>No se han podido guardar el producto";
            }
        }

        public static function listar(){
            $con = conectar();
            $sql = "select * from productos;";
            $resulset = consultar($con,$sql);

            while($data = mysqli_fetch_assoc($resulset)){
                echo "<br><br>-----------------------------<br><br>";
                echo "ID del producto: " .$data['id'] ."<br>";
                echo "Nombre del producto: " .$data['descripcion'] ."<br>";
                echo "Descripcion del producto: " .$data['precio'] ."<br>";
            }
        }
    }

?>