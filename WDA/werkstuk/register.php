<?php 
include 'header.php';
include 'database/insertUsers.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
</head>
<body>
  <main>
    <div class="container">
      <div class="row">
        <form class="col s12" name="RegisterForm" method="POST" action="">
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="Firstname" name="Firstname" type="text" class="validate" >
              <label for="Firstname">First name</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="Lastname" name="Lastname" type="text" class="validate">
              <label for="Lastname">Last Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">lock_outline</i>
              <input id="Password" name="Password" type="password" class="validate">
              <label for="Password">Password</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">lock_outline</i>
              <input id="repeatPassword" name="repeatPassword" type="password" class="validate">
              <label for="repeatPassword">Repeat password</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">email</i>
              <input id="Email" type="email" name="Email" class="validate">
              <label for="Email" data-error="wrong" data-success="right">Email</label>
            </div>
          </div>
          <input class="btn waves-effect waves-light" type="submit" name="submitForm" value="Submit">
          <?php if(!empty($message)) { ?> 
          <div class="message"><?php if(isset($message)) echo $message; ?></div>
          <?php } ?>

        </form>
      </div>
    </div>
  </main>
</body>
</html>

<?php 
include 'footer.php';
?>