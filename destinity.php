<?php
    // VERIFICO QUE ENTRE ALGUN DATO
    if (isset($_GET["mi_check"])){
        // GUARDO EL DATO EN LA VARIABLE
        $mi_check = $_GET["mi_check"];
        // RECORRO EL ARRAY Y BAUTIZO CADA SELECCION COMO $FILA
        foreach($mi_check as $fila){
        // MUESTRO CADA ITEM
        echo "<br>El ingrediente $fila fue seleccionado";
        }
    }
    else{
        // SI NO RECIBE DATOS, SE MUESTRA ESTO
        echo "No selecciono nada.";
    }

?>