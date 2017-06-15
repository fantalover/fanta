<?php
/**
 * Created by PhpStorm.
 * User: Phil
 * Date: 14-Feb-17
 * Time: 14:07
 */
define("PI", 3.14159);


function berekenOppervlakteCirkel($straal){
    $result = PI * ($straal * $straal);
    return $result;
}

print berekenOppervlakteCirkel(2.2);

?>