<?php
include 'database/connection.php';

//$sql= "SELECT * FROM producten ORDER BY ID DESC";

$sql =" select  p.*, i.* FROM producten p, Images i WHERE  i.ID = p.Image";


$result = $conn->query($sql);
?>