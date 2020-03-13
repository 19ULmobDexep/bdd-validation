<?php
function exposant($val1, $val2){
    $resultat = 1;
    for ($i = 0; $i<$val2; $i++){
        $resultat = $resultat * $val1 ;
    }
    return $resultat ;
}
?>
