<?php

function getRandom($id){
include 'database/connection.php';

$sql = "SELECT  p.*, i.* FROM producten p, Images i WHERE  i.ID = p.Image AND p.ID != $id order by RAND() LIMIT 4";
$randomresult = $conn->query($sql);
return $randomresult;
}


?>