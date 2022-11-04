    <!-- CALCULADORA -->
<form action="" method=get>
    <ins>Numero 1</ins>:<input type=number name=varible_inicial>
    <ins>Numero 2</ins>:<input type=number name=variable_final>
    <input type=submit name=calculate value=Calcular>
</form>

<?php
    if (isset($_GET["calculate"])){
        $x = $_GET["varible_inicial"];
        $y = $_GET["variable_final"];

        function calcular($varible_inicial, $variable_final){
            $suma = $varible_inicial + $variable_final;
            $resta = $varible_inicial - $variable_final;
            $multiplicacion = $varible_inicial * $variable_final;
            $division = $varible_inicial / $variable_final;

            return "Suma: $varible_inicial + $variable_final = $suma<br>
            Resta: $varible_inicial - $variable_final = $resta<br>
            Multiplicación: $varible_inicial * $variable_final = $multiplicacion<br>
            División: $varible_inicial / $variable_final = $division";
        }
    }
    echo calcular($x, $y);

?>

<br><br>

    <!-- SUELDO + SUELDO POR HIJO/S -->
<form action="" method=get>
    <ins>Sueldo</ins>:<input type=number name=sueldo><br><br>
    <ins>Antiguedad</ins>:<input type=number name=antiguedad><br><br>
    <ins>Cantidad de Hijos</ins>:<input type=number name=cantidad_hijos><br>
    <input type=submit name=enviar value=Calcular>
</form>

<?php 
    if (isset($_GET["enviar"])){
        $sueldo = $_GET["sueldo"];
        $antiguedad = $_GET["antiguedad"];
        $cantidad_hijos = $_GET["cantidad_hijos"];

        function calcular_sueldo($sueldo, $antiguedad, $cantidad_hijos){
            if ($antiguedad>5 and $antiguedad<10){
                $procentaje = ($sueldo*10)/100;
                $sueldo_por_hijo = $cantidad_hijos*1000;
                $total = $sueldo + $procentaje + $sueldo_por_hijo;
            }
            elseif ($antiguedad>10){
                $procentaje = ($sueldo*20)/100;
                $sueldo_por_hijo = $cantidad_hijos*1000;
                $total = $sueldo + $procentaje + $sueldo_por_hijo;
            }
            else{
                $procentaje = ($sueldo*0)/100;
                $sueldo_por_hijo = $cantidad_hijos*1000;
                $total = $sueldo + $procentaje + $sueldo_por_hijo;
            }

            return "Sueldo Bruto: $ $sueldo.<br>
            Antiguedad: $antiguedad años. <br>
            Porcentaje: % $procentaje. <br>
            Cantidad de hijos: $cantidad_hijos y el sueldo por hijos en total es hijos:$ $cantidad_hijos<br>
            Total a cobrar:$ $total ";
        }

        echo calcular_sueldo($sueldo, $antiguedad, $cantidad_hijos);
    }
?>