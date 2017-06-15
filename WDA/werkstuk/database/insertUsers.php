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
  /* Password Matching Validation */
  if($_POST['Password'] != $_POST['repeatPassword']){ 
  $message = 'Passwords should be same<br>'; 

  }

  /* Email Validation */
  if(!isset($message)) {
    if (!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {
    $message = "Invalid Email Address";
    }
  }

  if(!isset($message)) {
    $sql = "INSERT INTO Users (Firstname, Lastname,Email, Password, Admin) VALUES
    ('" . $_POST["Firstname"] . "', '" . $_POST["Lastname"] . "', '" . $_POST["Email"] . "', '" . md5($_POST["Password"]) . "', '" . 0 . "')";
    $result = $conn->query($sql);
    if(!empty($result)) {
      $message = "";
      $message = "You have registered successfully!"; 
     
      unset($_POST);
    } else {
      $message = "Problem in registration. Try Again!"; 
    }
  }
}






 ?>