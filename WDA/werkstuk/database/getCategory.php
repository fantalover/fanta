<?php


include 'database/connection.php';

$sql = "SELECT * FROM Category";
$CategoryResult = $conn->query($sql);
return $CategoryResult;



?>