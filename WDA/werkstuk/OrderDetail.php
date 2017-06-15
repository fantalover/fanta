<?php 
session_start();
include 'header.php';
include 'database/connection.php';
include "database/getproductByID.php";
$id = $_GET['id'];


$sql = "SELECT * FROM OrderDetail WHERE OrdersID = $id";
$OrderDetailResult = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Overzicht van de bestellingen</title>
</head>

<body>
  <main>
    <div id="container" class="container">
      <div id="content">

        <h1 class="sup">Bestelling detail</h1>
    <div class="row">
    <h5>items</h5>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>short description</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
      <?php
          if ($OrderDetailResult->num_rows > 0) {
            while($row = $OrderDetailResult->fetch_assoc()) {
              $productID = getelementbyid($row["ID"]);
                while ($Product = $productID->fetch_assoc()){
                  
            ?>


              <tr>
                <td><?php echo $Product["Name"]?></td>
                <td><?php echo $Product["short description"]?></td>
                <td>€<?php echo $Product["Price"] ?></td>

              </tr>
            
          

            <?php

          }
        }
      } 
      ?>
      </tbody>
    </table>
  </div>
      </div>
    </main>
  </body>
  </html>
  <?php 
  include 'footer.php';
  ?>
