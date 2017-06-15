<?php
include 'database/connection.php';
		
$sql="select  p.*, i.* FROM producten p, Images i WHERE  i.ID = p.Image order by p.ID DESC  LIMIT 4";
$results = $conn->query($sql);

?>

SELECT T1.*, T2.* FROM table1 T1, table2 T2 WHERE T1.PRIMARY = T2.FOREIGN;

