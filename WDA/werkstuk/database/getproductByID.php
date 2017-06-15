<?php
include 'database/connection.php';
		
if(!empty($_POST["id"])) {
$id = $_POST['id'];}
else{
	$id = 2;
}

$sql ="select pr.*, img.*
FROM 
	producten pr
INNER JOIN
	Images img on pr.Image = img.ID
WHERE 
	pr.ID = '$id'
	";
$getByIdResult = $conn->query($sql);



function getelementbyid($ID){
include 'database/connection.php';
	$sql ="select pr.*, img.*
FROM 
	producten pr
INNER JOIN
	Images img on pr.Image = img.ID
WHERE 
	pr.ID = '$ID'
	";
$getByIdResults = $conn->query($sql);
return $getByIdResults;
}

?>