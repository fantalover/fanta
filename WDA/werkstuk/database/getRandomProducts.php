<?php
include 'database/connection.php';

$sql =" select  p.*, i.* FROM producten p, Images i WHERE  i.ID = p.Image order by RAND() LIMIT 4";
$result = $conn->query($sql);



?>