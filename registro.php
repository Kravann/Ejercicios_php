<form action="" method=get>
    <ins>Nombre</ins>:<input type=text name=nombre ><br><br>
    <ins>Apellido</ins>:<input type=text name=apellido ><br><br>
    <ins>DNI</ins>:<input type=number name=documento ><br><br>
    <input type=submit name=upload value="Cargar Datos"><br><br>
    <input type=submit name=show value="Mostrar Registros">
</form>
<br><br><br><br>

<?php
    # DATABASE CONNECTED FUNCTION
    function conectar(){
        $server = "localhost";
        $user = "root";
        $pass = "";
        $bd = "LemosGuia3";
        $c = mysqli_connect($server, $user, $pass, $bd);
        return $c;
    }


    if (isset($_GET["upload"])){
        $nombre = $_GET["nombre"];
        $apellido = $_GET["apellido"];
        $documento = $_GET["documeto"];

        function get_registro($nombre, $apellido, $documento){
            $c = conectar(); // ejemplo porque no sirbe
            $sql = "INSERT INTO usuario(nombre, apellido, dni) VALUES ('$nombre', '$apellido', '$documento')";
            $result = mysqli_query($c, $sql);

            if (mysql_affected_rows($c)>0){
                $response = "El usuario $nombre $apellido fue cargado con éxito.";
            }
            else{
                $response = "El usuario $nombre $apellido no se ha podido cargar.";
            }

            return $response;
        }
    }

    echo get_registro($nombre, $apellido, $documento)
?>

<?php
    if (isset($_GET["show"])){
        function get_mostrar(){
            $c = conectar;
            $sql = "SELECT * FROM usuario";
?>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Dni</th>
                </tr>
                <?php
                    $response = mysqli_query($c, $sql);

                    while ($fila = mysqli_query($response)){
                ?>
                        <tr>
                            <td><?php echo $fila["id"] ?></td>
                            <td><?php echo $fila["nombre"] ?></td>
                            <td><?php echo $fila["apellido"] ?></td>
                            <td><?php echo $fila["dni"] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
            </table>
<?php
        }
        echo get_mostrar();
    }
?>