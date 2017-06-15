<?php
function GetId($name) {
	include 'database/connection.php';
    $sql ="select ID
FROM 
	producten pr

WHERE 
	pr.Name = '$name'
	";
	
	$getByNameResult = $conn->query($sql);
	   if ($getByNameResult->num_rows > 0) {
    while($row = $getByNameResult->fetch_assoc()) {
        $id = $row["ID"];
    }}


   return $id;
}



?>