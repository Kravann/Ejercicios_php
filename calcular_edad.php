<!-- CALCULAR EDAD -->

<form action="" method=get>
    <input type=date name=edad>
    <input type=submit value=calcular name=calcular_edad>
</form>

<?php
    // metodo get muestra los datos en la url
    // metodo post no muestra los datos sensibles en la url
    if (isset($_GET["calcular_edad"])){
        $dia = date_create($_GET["edad"]);
        $edad = date_format($dia, "Y");

        function dia($dia){
            $now = date("Y");
            $date_difference = $now - $dia;
            
            return $date_difference;
        }
        echo "El usuario tiene ".dia($edad)." años.";
    }
?>

<br><br>
<!-- COMO ESTAS -->

<form action="" method=get>
    <input type=text name=nombre>
    <input type=text name=ape>
    <input type=submit name=enviar value=confirmar>
</form>
<?php
    if (isset($_GET["enviar"])){
        $nombre = $_GET["nombre"];
        $apellido = $_GET["apellido"];

        // solo son parametros
        function saludar($x, $y){
            return "Hola  ¿Como estas?";
        }
        echo saludar($nombre, $apellido);
    }
?>
<br><br>

<!-- VERIFICAR SI APROBO LA CURSADA -->

<form action="" method=get>
    <ins>NOTA 1</ins>:<input type=number name=nota1><br><br>
    <ins>NOTA 2</ins>:<input type=number name=nota2><br><br>
    <ins>NOTA 3</ins>:<input type=number name=nota3><br>
    <input type=submit name=cursada value=Calcular>
</form>

<?php
    // VERIFICA SI APRUEBA LA CURSADA MEDIANTE 3 NOTAS
    if (isset($_GET["cursada"])){
        $nota1 = $_GET["primer_nota"];
        $nota2 = $_GET["segunda_nota"];
        $nota3 = $_GET["tercera_nota"];

        function promedio($x, $y, $z){
            $promedio = ($x + $y + $z)/3;

            if ($promedio >= 7 && $promedio <= 10){
                $response = "El alumno esta aprobado";
            }
            elseif ($promedio < 4){
                $response = "El alumno esta aplazado";
            }
            else{
                $response = "El alumno esta desaprobado";
            }

            return $response;
        }
    }
    echo promedio($nota1, $nota2, $nota3);


?>

<br><br>

<!-- VERIFICAR DIA -->

<form action="" method=post>
    <input type=number name=fecha>
    <input type=submit name=verificar_dia value=Dia>
</form>

<?php
    if (isset($_POST["verificar_dia"])){
        $dia = $_POST["fecha"];

        function dia_semana($dia){
            switch($dia){
                case "1":
                    $response = "Domingo";
                    break;
                case "2":
                    $response = "Lunes";
                    break;
                case "3":
                    $response = "Martes";
                    break;
                case "4":
                    $response = "Miércoles";
                    break;
                case "5":
                    $response = "Jueves";
                    break;
                case "6":
                    $response = "Viernes";
                    break;
                case "7":
                    $response = "Sabado";
                    break;
                default:
                    $response = "No éxiste ese número de la semana.";
                    break;
            }
            
            return $response;
        }

        echo dia_semana($dia);
    }

?>