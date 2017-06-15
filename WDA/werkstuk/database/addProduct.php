<?php
include 'database/connection.php';

if(!empty($_POST["submitForm"])) {
  /* Form Required Field Validation */
   foreach($_POST as $key=>$value) {
     if(empty($_POST[$key])) {
     $message = "All Fields are required";
     break;
     }
   }


  if(!isset($message)) {
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $imagename = "kiwi";
    $sqlImage = "INSERT INTO Images (Name, Image) VALUES ('" . $_POST["Name"] . "', '" .  $image ."')";
    $Imageresult = $conn->query($sqlImage);
    $ImageID = $conn->insert_id;
    echo $ImageID;

    $sqlProduct = "INSERT INTO `producten`(`Name`, `short description`, `Description`, `Price`, `Category`, `Image`) VALUES ('" . $_POST["Name"] . "', '" . $_POST["shortDescription"] . "', '" . $_POST["Description"] . "', '" . $_POST["Price"] . "', '" . $_POST["Category"] ."', '" . $ImageID ."')";

    $result = $conn->query($sqlProduct);
    if(!empty($result)) {
      $message = "";
      $message = "You have successfully added a product!"; 
     
      unset($_POST);
    } else {
      $message = "Problem in adding a product. Try Again!"; 
    }
  }
}
?>