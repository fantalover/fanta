<?php 
session_start();
include 'header.php';
include 'database/connection.php';

    $sql = "INSERT INTO Factuuradres (Street, HouseNumber, PostalCode, City) VALUES ('" . $_SESSION["Factuuradres"]["Street"] . "', '" . $_SESSION["Factuuradres"]["HouseNumber"] . "', '" . $_SESSION["Factuuradres"]["PostalCode"] . "', '" . $_SESSION["Factuuradres"]["City"] . "')";
    $result = $conn->query($sql);

     $sql = "INSERT INTO Leveradres (Street, HouseNumber, PostalCode, City) VALUES ('" . $_SESSION["Leveradres"]["StreetL"] . "', '" . $_SESSION["Leveradres"]["HouseNumberL"] . "', '" . $_SESSION["Leveradres"]["PostalCodeL"] . "', '" . $_SESSION["Leveradres"]["CityL"] . "')";
     $result = $conn->query($sql);


    $street = $_SESSION["Factuuradres"]["Street"];
    $houseNumber = $_SESSION["Factuuradres"]["HouseNumber"];
    $postalCode = $_SESSION["Factuuradres"]["PostalCode"];
    $city = $_SESSION["Factuuradres"]["City"];
    $sqlFactuur = "SELECT ID FROM Factuuradres WHERE Street = '$street' AND HouseNumber = '$houseNumber' AND PostalCode = '$postalCode' AND City = '$city'";
    $resultFactuur = $conn->query($sqlFactuur);
    if ($resultFactuur->num_rows > 0) {
            while($row = $resultFactuur->fetch_assoc()) {
              $factuuradresID = $row['ID'];

    }}

    $streetL = $_SESSION["Leveradres"]["StreetL"];
    $houseNumberL = $_SESSION["Leveradres"]["HouseNumberL"];
    $postalCodeL = $_SESSION["Leveradres"]["PostalCodeL"];
    $cityL = $_SESSION["Leveradres"]["CityL"];
    $sqlLevering = "SELECT ID FROM Leveradres WHERE Street = '$streetL' AND HouseNumber = '$houseNumberL' AND PostalCode = '$postalCodeL' AND City = '$cityL'";
    $resultLevering = $conn->query($sqlLevering);

    if ($resultLevering->num_rows > 0) {
        while($row = $resultLevering->fetch_assoc()) {
            $LeveringsadresID = $row['ID'];

    }}

     $Levermethode = $_SESSION["delivery"];
     $Betaalmethode = $_SESSION["betaling"];

     $sql = "INSERT INTO Orders (userID, FactuuradresID, LeveringsadresID, Levermethode, Betaalmethode) VALUES ('" . "1" . "', '" . $factuuradresID . "', '" . $LeveringsadresID . "', '" . $Levermethode . "', '" . $Betaalmethode . "')";
     $result = $conn->query($sql);

     $userID = 1;
     $Levermethode = $_SESSION["delivery"];
     $Betaalmethode = $_SESSION["betaling"];

     $sqlOrders = "SELECT ID FROM Orders WHERE userID = '$userID' AND FactuuradresID = '$factuuradresID' AND LeveringsadresID = '$LeveringsadresID' AND Levermethode = '$Levermethode' AND Betaalmethode =  '$Betaalmethode'";
       $resultOrders = $conn->query($sqlOrders);

    if ($resultOrders->num_rows > 0) {
        while($row = $resultOrders->fetch_assoc()) {
            $OrdersID = $row['ID'];

    }}
  

    foreach ($_SESSION["cart_item"] as $item) {
      $quantity = $item["quantity"];
      $TotalPrice = $item["quantity"] * $item["price"];
      $productID = $item["code"];

      $sql = "INSERT INTO OrderDetail (ProductID, OrdersID, Quantity, TotalPrice) VALUES ('" . $productID . "', '" . $OrdersID . "', '" . $quantity . "', '" . $TotalPrice . "')";
      $result = $conn->query($sql);
      echo $result;
    }

 
?>
<!DOCTYPE html>
  <html>
    <head>
    </head>
    <body>

   
    <h3>we hebben je bestelling met succes verwerkt.</h3>

      
    </body>
  </html>

<?php 
  include 'footer.php';

?>