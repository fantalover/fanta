<?php 
session_start();
include 'header.php';
include 'database/connection.php';

//$sql = "SELECT  Orders.*, Users.* FROM Orders, Users WHERE  Orders.userID = Users.ID";
//$sql = "SELECT * FROM Orders";

// $sql ="select OrderDetail.*, producten.*, Orders.*
// FROM 
//   OrderDetail
// INNER JOIN
//   producten on OrderDetail.ProductID = producten.ID
// LEFT JOIN 
//   Orders on OrderDetail.OrdersID = Orders.ID
// WHERE 
//   OrderDetail.ID = 1

//   ";

  $getAllOrdersSQL = "SELECT * FROM Orders";
  $result = $conn->query($getAllOrdersSQL);
  function getUser($id){
    include 'database/connection.php';
    $userSQL = "SELECT * FROM Users WHERE ID = $id";
    $userResult = $conn->query($userSQL);
    return $userResult;
  }
  function getFactuurAdres($id){
    include 'database/connection.php';
    $FactuurSQL = "SELECT * FROM Factuuradres WHERE ID = $id";
    $FactuurResult = $conn->query($FactuurSQL);
    return $FactuurResult;
  }
  function getLeveringsAdres($id){
    include 'database/connection.php';
    $leveringSQL = "SELECT * FROM Leveradres WHERE ID = $id";
    $LeveringResult = $conn->query($leveringSQL);
    return $LeveringResult;}


?>

<!DOCTYPE html>
<html>
<head>
  <title>Overzicht van de bestellingen</title>
</head>

<body>
  <main>
  <?php 


  ?> 
    <div id="container" class="container">
      <div id="content">

        <h1 class="sup">Alle bestellingen</h1>
        <div class="row">

     <table>
      <thead>
        <tr>
          <th>User</th>
          <th>Factuuradres</th>
          <th>Leveringsadres</th>
          <th>Levermethode</th>
          <th>Betaalmethode</th>
          <th>Check Detail</th>
        </tr>
      </thead>
      <tbody>
      <?php
         if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            
            ?>


              <tr>
                <td>
                <?php
                  $users = getUser($row["userID"]);
                  if ($users->num_rows > 0) {
                    while($row1 = $users->fetch_assoc()) {
                        echo $row1["Firstname"];
                        echo " ";
                        echo $row1["Lastname"];
                      }} 
                 ?>
                  
                </td>
                <td>
                <?php
                  $Address = getFactuurAdres($row["FactuuradresID"]);
                  if ($Address->num_rows > 0) {
                    while($row2 = $Address->fetch_assoc()) {
                        echo $row2["Street"];
                        echo " ";
                        echo $row2["HouseNumber"];
                        echo ", ";
                        echo $row2["PostalCode"]; 
                        echo " ";
                        echo $row2["City"];
                      }} 

                 ?>
                  
                </td>
                <td>
                <?php
                  $LAddress = getLeveringsAdres($row["LeveringsadresID"]);
                  if ($LAddress->num_rows > 0) {
                    while($row3 = $LAddress->fetch_assoc()) {
                        echo $row3["Street"];
                        echo " ";
                        echo $row3["HouseNumber"];
                        echo ", ";
                        echo $row3["PostalCode"]; 
                        echo " ";
                        echo $row3["City"];
                      }} 
                ?>
        
                </td>
                <td>
                <?php echo $row["Levermethode"]?>
                  
                </td>
                <td>
                <?php echo $row["Betaalmethode"]?>
                  
                </td>
                <td><a href="OrderDetail.php?id=<?php echo $row["ID"]?>">Check Detail</a></td>
              </tr>
            
          

            <?php

          
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
               <!--  <h1>LeverAdres</h1>
                <p>Street: <?php echo $row["Street"] ?></p>
                <p>HouseNumber: <?php echo $row["HouseNumber"] ?></p>
                <p>PostalCode: <?php echo $row["PostalCode"] ?></p>
                <p>City: <?php echo $row["City"] ?></p> -->