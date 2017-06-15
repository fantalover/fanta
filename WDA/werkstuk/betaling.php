<?php 
include 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Checkout</title>
</head>
<body>
  <main>
    <div class="container">
      <div class="row">
        <form class="col s12" name="CheckoutForm" method="POST" action="">
          <div class="row">
            <h4>Select your payment method</h4>
            
              <p>
                <input name="betaling" type="radio" id="Bancontact" />
                <label for="Bancontact">Bancontact</label>
              </p>
              <p>
                <input name="betaling" type="radio" id="Creditcard" />
                <label for="Creditcard">Creditcard</label>
              </p>
              <p>
                <input name="betaling" type="radio" id="later" />
                <label for="later">Achteraf betaling</label>
              </p>            

              <p>
                <input type="checkbox" id="test5" />
                <label for="test5">I have read and agree to the Terms and Conditions and Privacy Policy</label>
              </p>
              <input class="btn waves-effect waves-light" type="submit" name="submitForm" value="Next">

          </div>
        </div>
      </main>
    </body>
    </html>

    <?php 
    include 'footer.php';
    ?>