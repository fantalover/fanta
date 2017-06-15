<?php
  include 'header.php';
  include 'database/LoginScript.php';
?>
<html>

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
  <style>

    body {
      background: #fff;
    }

    .input-field input[type=date]:focus + label,
    .input-field input[type=text]:focus + label,
    .input-field input[type=email]:focus + label,
    .input-field input[type=password]:focus + label {
      color: #e91e63;
    }

    .input-field input[type=date]:focus,
    .input-field input[type=text]:focus,
    .input-field input[type=email]:focus,
    .input-field input[type=password]:focus {
      border-bottom: 2px solid #e91e63;
      box-shadow: none;
    }
  </style>
</head>

<body>
  <div class="section"></div>
  <main>
    <center>
      <img class="responsive-img" style="width: 250px;" src="http://www.simpele-recepten.nl/wp-content/uploads/2014/09/Groente-recepten.jpg" />
      <div class="section"></div>

      <h5 class="indigo-text">Please, login into your account</h5>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
<?php if(empty($_SESSION["ID"])) { ?>
          <form class="col s12" method="post" action="">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='email' name='Email' id='Email' />
                <label for='email'>Enter your email</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='Password' id='password' />
                <label for='password'>Enter your password</label>
              </div>
              <label style='float: right;'>
								<a class='pink-text' href='#!'><b>Forgot Password?</b></a>
							</label>
            </div>
            <div class="row">
            <input type="checkbox" name="RememberMe" id="RememberMe">
            <label for="RememberMe">Remember me</label>
            </div>

            <br />
            <center>
              <div class='row'>
               <button style="background-color:#8BB95F" type="submit" name="Login" value="Login" class='col s12 btn btn-large waves-effect'>Login</button>
              </div>
            </center>
          </form>
          <?php } else { 
            var_dump($_SESSION["ID"]);
            header("Location: index.php");
            ?>
<div class="member-dashboard">You have Successfully logged in!. <a href="database/logout.php">Logout</a></div>

<?php } ?>
        </div>
      </div>
      <a href="register.php">Create account</a>
    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</body>

</html>


<?php 
  include 'footer.php';
 ?>