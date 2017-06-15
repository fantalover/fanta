<?php
session_start(); 
include 'header.php';
include 'database/addProduct.php';
include 'database/getCategory.php';


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
      <form class="col s12" name="RegisterForm" method="POST" action="" enctype="multipart/form-data">

        <div class="row">
          <div class="input-field col s6">
            <input id="Name" name="Name" type="text" class="validate" >
            <label for="Name">product name</label>
          </div>
          <div class="input-field col s6">
            <input id="shortDescription" name="shortDescription" type="text" class="validate">
            <label for="shortDescription">short Description</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
          <textarea id="Description" name="Description" type="text" class="validate"></textarea>
            <label for="Description">Description</label>
          </div>
          <div class="input-field col s6">
            <input id="Price" name="Price" type="text" class="validate">
            <label for="Price">Price</label>
          </div>
          <div class="input-field col s6">
            <select name="Category">
              <option value="" disabled selected>Choose your Category</option>
              <?php
              //$CategoryResult
               // get category

              if ($CategoryResult->num_rows > 0) {
                while($row = $CategoryResult->fetch_assoc()) {
                  ?>
                  <option name="CategoryOption" value="<?php echo $row['ID'] ?>"><?php echo $row['Category'] ?></option>
                  <?php

                }}

                ?>
              </select>
              <label>Category Select</label>
            </div>
            <div class="row">
              <div class="file-field input-field col s12">
                <div class="btn">
                  <span>File</span>
                  <input name="image" type="file">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" name="Image" type="text">
                </div>
              </div>
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
