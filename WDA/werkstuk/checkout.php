<?php 
session_start();
include 'header.php';

$message="";
if(!empty($_POST["CheckoutForm"])) {

  if(empty($_POST['Street'])){ 
  $message = 'Field is empty'; 
  }
  if(empty($_POST['HouseNumber'])){ 
  $message = 'Field is empty'; 
  }
  if(empty($_POST['PostalCode'])){ 
  $message = 'Field is empty'; 
  }
  if(empty($_POST['City'])){ 
  $message = 'Field is empty'; 
  }
  if (isset($_POST['FactuuradresCheckbox'])) {
    $Leveradres = array('StreetL' => $_POST['Street'],'HouseNumberL' => $_POST['HouseNumber'],'PostalCodeL' => $_POST['PostalCode'],'CityL' => $_POST['City']);
    echo "factuuradres";
  }else{
  if(empty($_POST['StreetL'])){ 
  $message = 'Field is empty'; 
  }
  if(empty($_POST['HouseNumberL'])){ 
  $message = 'Field is empty'; 
  }
  if(empty($_POST['PostalCodeL'])){ 
  $message = 'Field is empty'; 
  }
  if(empty($_POST['CityL'])){ 
  $message = 'Field is empty'; 
  }
    $Leveradres = array('StreetL' => $_POST['StreetL'],'HouseNumberL' => $_POST['HouseNumberL'],'PostalCodeL' => $_POST['PostalCodeL'],'CityL' => $_POST['CityL'] );
    echo "leveradres";
  }
  var_dump($Leveradres);
if (isset($_POST['betaling'])) {
   switch($_POST['betaling']) {
        case "Bancontact":
            $value = "Bancontact";
            break;
        case "Creditcard":
            $value = "Creditcard";
            break;
        case "later":
            $value = "later";
            break;
        default:
            $message = "Field is empty";
    }
  }

  if (isset($_POST['delivery'])) {
   switch($_POST['delivery']) {
        case "postman":
            $val = "postman";
            break;
        case "takeout":
            $val = "takeout";
            break;
        default:
            $message = "Field is empty";
    }
  }
  if($message == "" && isset($_POST['Conditions'])){
   
     $Factuuradres = array('Street' => $_POST['Street'],'HouseNumber' => $_POST['HouseNumber'],'PostalCode' => $_POST['PostalCode'],'City' => $_POST['City']);
     $_SESSION["Factuuradres"] = $Factuuradres;
     $_SESSION["Leveradres"] = $Leveradres;
     $_SESSION["betaling"] = $value;
     $_SESSION["delivery"] = $val;

    header("Location: FinalPage.php");
  }

 }


?>

<!DOCTYPE html>
<html>
<head>
  <title>Checkout</title>
</head>
<body>
  <main>
    <?php 
      if (!empty($_SESSION["ID"]))  {
    ?>
    <div class="container">
      <div class="row">
        <form class="col s12"  method="post" action="">
          <div class="row">
            <h4>Factuuradres</h4>
            <div class="row">
              <div class="input-field col s6">
                <i class="material-icons prefix">account_circle</i>
                <input id="Street" name="Street" type="text" class="validate" >
                <label for="Street">Street</label>
              </div>
              <div class="input-field col s6">
                <i class="material-icons prefix">account_circle</i>
                <input id="HouseNumber" name="HouseNumber" type="text" class="validate">
                <label for="HouseNumber">House Number</label>
              </div>
              <div class="input-field col s6">
                <i class="material-icons prefix">account_circle</i>
                <input id="PostalCode" name="PostalCode" type="text" class="validate">
                <label for="PostalCode">Postal Code</label>
              </div>
              <div class="input-field col s6">
                <i class="material-icons prefix">account_circle</i>
                <input id="City" name="City" type="text" class="validate">
                <label for="City">City</label>
              </div>
            </div>
          </div>
          <div class="row" id="Leveradres">
            <h4>Leveradres</h4>
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="StreetL" name="StreetL" type="text" class="validate" >
              <label for="StreetL">Street</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="HouseNumberL" name="HouseNumberL" type="text" class="validate">
              <label for="HouseNumberL">House Number</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="PostalCodeL" name="PostalCodeL" type="text" class="validate">
              <label for="PostalCodeL">Postal Code</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="CityL" name="CityL" type="text" class="validate">
              <label for="CityL">City</label>
            </div>
          </div>
        </div>
          <p>
                <input type="checkbox" name="FactuuradresCheckbox" id="Factuuradres" />
                <label for="Factuuradres">Gebruik factuuradres</label>
              </p>
          <div class="row">
            <h4>Select your payment method</h4>
            
              <p>
                <input name="betaling" type="radio" id="Bancontact" value="Bancontact" />
                <label for="Bancontact">Bancontact</label>
              </p>
              <p>
                <input name="betaling" type="radio" id="Creditcard" value="Creditcard" />
                <label for="Creditcard">Creditcard</label>
              </p>
              <p>
                <input name="betaling" type="radio" id="later" value="later" />
                <label for="later">Achteraf betaling</label>
              </p>            

              <p>
                <input type="checkbox" name="Conditions" id="Terms" />
                <label for="Terms">I have read and agree to the Terms and Conditions and Privacy Policy</label>
              </p>

          </div>
          <div class="row">
            <h4>Select your delivery method</h4>
            
              <p>
                <input name="delivery" type="radio" id="postman" value="postman" />
                <label for="postman">postman</label>
              </p>
              <p>
                <input name="delivery" type="radio" id="takeout" value="takeout" />
                <label for="takeout">takeout</label>
              </p>
          </div>
        <input type="submit" name="CheckoutForm" value="Next" class="btn ">
      </form>
    </div>
  </div>
  <?php
}else{
    ?><a class="waves-effect waves-light btn" href="Login.php">Please log in to continue</a><?php


  }
?>

</main>
</body>
</html>


<?php 
include 'footer.php';
?>

<script type="text/javascript">
  
$('#Factuuradres').click(function(){
this.checked?$('#Leveradres').hide():$('#Leveradres').show(); 
});

</script>