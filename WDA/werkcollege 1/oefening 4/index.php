
<?php 
 include("meetkunde.php");

?>
<!DOCTYPE html>
<html>
<head>
<title> php info</title>
</head>
<body>
<table style="width:100%">
  <tr>
    <th>cirkel</th>
    <th>driehoek</th> 
    <th>vierkant</th>
    <th>rechthoek</th>
  </tr>
  <tr>
    <td><?php echo berekenOppervlakteCirkel(2.2);    ?></td>
    <td><?php echo berekenOppervlakteDriehoek(5,5);  ?></td>
    <td><?php echo berekenOppervlaktevierkant(10);   ?></td>
    <td><?php echo berekenOppervlakteRechthoek(2,5); ?></td>
  </tr>

</table>
 
<footer>
<?php
 global $functionsExecutedCounter;
 echo $functionsExecutedCounter;
 ?>
</footer>

</body>
</html>