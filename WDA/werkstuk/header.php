<!DOCTYPE html>
<html>
<head>
  <title></title>

     <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <link rel="icon" type="image/png" href="image/strawberry.png" />
      <link type="text/css" rel="stylesheet" href="css/main.css">
      <link rel="stylesheet" type="text/css" href="css/modal.css">
      <style type="text/css">

      </style>
</head>
<body>
  
<ul id="dropdownAdmin" class="dropdown-content">
  <li><a href="ManageOrders.php">Beheer alle bestellingen</a></li>
  <li><a href="addProduct.php">Add Product</a></li>
  <li><a href="addCategory.php">Add Category</a></li>
  <li class="divider"></li>
  <li><a href="database/logout.php">Logout</a></li>
</ul>
<ul id="dropdownUser" class="dropdown-content">
  <li><a href="database/logout.php">Logout</a></li>
</ul>
<nav>
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo">Fruits & vegetables</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">All products</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="shoppingCartPage.php">Shopping cart</a></li>
      
        <?php 
        if (!empty($_SESSION["ID"])) {
            echo "<li>";
            if ($_SESSION["ID"]["Admin"]!=0) {
            echo "<a class=dropdown-button href=Login.php data-activates=dropdownAdmin data-beloworigin=true>";
          }
          else{
            echo "<a class=dropdown-button href=Login.php data-activates=dropdownUser data-beloworigin=true>";
          }
            echo $_SESSION["ID"]["Firstname"];
            echo " ";
            echo $_SESSION["ID"]["Lastname"];

            echo "</a>";
            echo "</li>";
        }else{
            echo "<li>";
            echo "<a href=Login.php>";
            echo "Login";
            echo "</a>";
            echo "</li>";
            echo "<li>";
            echo "<a href=Register.php>";
            echo "Register";
            echo "</a>";
            echo "</li>";
}
          ?>

      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">All products</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="shoppingCartPage.php">Shopping cart</a></li>
        <li><a href="Login.php">Login</a></li>
        <li><a href="Register.php">Register</a></li>
      </ul>
    </div>
  </nav>
</body>
</html>