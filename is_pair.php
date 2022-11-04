<?php
    // ES PAR
    function is_pair($x){
        if(($x % 2)==0){
            return true;        
        }
        else{
             return false;
        }
    }
    $y = is_pair(7);
    var_dump($y);
?>

<br><br>

<?php
    // ES IMPAR
    function is_not_pair($z){
        if(($z % 2)!=0){
            $z = true;
        }
        else{
            $z = false;
        }
        return $z;
    }
    $m = esImpis_not_pairar(9);
    var_dump($m);
?>

<br><br>

<?php
    // SALUDAR
    function saludar($nom, $ape){
        return "¡¡¡Hola ".$nom." ".$ape."!!! ¿como estas?";
    }
    echo saludar("Bernardo", "Fokas");
?>