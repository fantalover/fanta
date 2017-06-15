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
    $sql = "INSERT INTO Category (Category) VALUES ('" . $_POST["Category"] . "')";
    $result = $conn->query($sql);
    if(!empty($result)) {
      $message = "";
      $message = "You have successfully add a category!"; 
     
      unset($_POST);
    } else {
      $message = "Problem in adding a category. Try Again!"; 
    }
  }
}
?>