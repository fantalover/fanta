<?php
include 'database/connection.php';
		
if(!empty($_POST["Category"])) {
	if ($_POST["Category"] != "All") {
		$cat = $_POST['Category'];
}
else{
	$cat = "empty";
}

if ($cat == "empty") {
	$sql = "select  p.*, i.* FROM producten p, Images i WHERE  i.ID = p.Image";
}
else{

$sql ="select pr.*, img.*, cat.*
FROM 
	producten pr
INNER JOIN
	Images img on pr.Image = img.ID
LEFT JOIN 
	Category cat on pr.Category = cat.ID
WHERE 
	cat.Category = '$cat'

	";
}}

$getByCategoryResult = $conn->query($sql);

function getByCatAndID($id, $cat){
include 'database/connection.php';
	$sql ="select pr.*, img.*, cat.*
FROM 
	producten pr
INNER JOIN
	Images img on pr.Image = img.ID
LEFT JOIN 
	Category cat on pr.Category = cat.ID
WHERE 
	cat.Category = '$cat'
	AND pr.ID != '$id'

	";

	$getByCatAndIDResult = $conn->query($sql);
}


?>