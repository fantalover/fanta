<?php
session_start(); 
include 'header.php';
include 'database/addCategory.php';


 ?>
<!DOCTYPE html>
<html>
<head>
  <title>add Category</title>
</head>
<body>
  
 <main>
   <div class="container">
    <div class="row">
        <form class="col s12" name="addCategoryForm" method="POST" action="">
          <div class="row">
            <div class="input-field col s6">
              <input id="Category" name="Category" type="text" class="validate" >
              <label for="Category">Category: </label>
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
