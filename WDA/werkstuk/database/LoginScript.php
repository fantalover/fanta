<?php
include 'database/connection.php';


session_start();
if(!empty($_POST["Login"])) {
  $sql = "SELECT * FROM Users WHERE Email = '" . $_POST["Email"] . "' AND Password = '" . md5($_POST["Password"]) . "'";
  $result = $conn->query($sql);
  $user = mysqli_fetch_array($result);
  if($user) {
  	  $userData = array('ID' => $user["ID"], 'Firstname' => $user["Firstname"], 'Lastname' => $user["Lastname"], 'Admin' => $user["Admin"]);
      $_SESSION["ID"] = $userData;
      if(!empty($_POST["RememberMe"])) {
        setcookie ("Login",$_POST["Email"],time()+ (10 * 365 * 24 * 60 * 60));
        setcookie ("Password",$_POST["Password"],time()+ (10 * 365 * 24 * 60 * 60));
      } else {
        if(isset($_COOKIE["Login"])) {
          setcookie ("Login","");
        }
        if(isset($_COOKIE["Password"])) {
          setcookie ("Password","");
        }
      }
  } else {
    $message = "Invalid Login";
  }
}

?>
