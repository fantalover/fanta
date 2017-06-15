<?php 
session_start();
include 'header.php';
include 'database/getAllProducts.php';
include 'database/getproductByID.php';
include 'database/getCategory.php';
if (!empty($_SESSION["ID"]))  {
if(!empty($_POST["RatingForm"])) {
if (isset($_POST['rating']) && isset($_POST['ProductID']) && isset($_POST['comment']) ) {
    $sql = "INSERT INTO Rating (ProductID, Rating, Comment) VALUES ('" . $_POST['ProductID']  . "', '" . $_POST["rating"] . "', '" . $_POST["comment"] . "')";
    $Ratingresult = $conn->query($sql);
  }
}



}


?>

<!DOCTYPE html>
<html>
<head>
  <title>products</title>
  <style type="text/css">
    #truncateLongTexts {
      width: 100%;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis 
    }

    #category_dropdown{
      float: right;
      background-color: #8BB95F;
    }
    .dropdown_text{
      color: #8BB95F !important;
    }


  </style>
</head>

<body>
  <main>
    <div id="container" class="container">
      <div id="content">
        <ul  id="dropdown2" class="dropdown-content">
            <li><a class="dropdown_text"  onClick = "selectCategory('All')">All products</a></li>
        <?php 
              if ($CategoryResult->num_rows > 0) {
                while($catrow = $CategoryResult->fetch_assoc()) {

        ?>

          <li><a class="dropdown_text"  onClick = "selectCategory('<?php echo $catrow["Category"] ?>')"><?php echo $catrow["Category"] ?></a></li>
                
          <?php
        }
      }
          ?>
        </ul>
        <a id="category_dropdown" class="btn dropdown-button" href="#!" data-activates="dropdown2">Kies categorie<i class="mdi-navigation-arrow-drop-down right"></i></a>
        <h1 class="sup">Onze producten</h1>
        <div id="products" class="row">
          <?php    
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              ?>
              <div id="cardHeader" class="col s3">
                <div class="card">
                  <?php
                  $in_session = "0";
                  if(!empty($_SESSION["cart_item"])) {
                    $session_code_array = array_keys($_SESSION["cart_item"]);
                    if(in_array($row["ID"],$session_code_array)) {
                      $in_session = "1";
                    }
                  }
                  ?>
                  <div class="card-image">
                    <img width="175" height="200" src="data:image/jpeg;base64,<?php echo base64_encode( $row['Image'] ); ?>" />

                    <button disabled style="display: none;" id="added_<?php echo $row["ID"]; ?>"  class="btnAdded btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons prefix">shopping_cart</i></button>
                    <button style="display: none;" id="add_<?php echo $row["ID"]; ?>"  class="btnAddAction btn-floating halfway-fab waves-effect waves-light red" onClick = "cartAction('add','<?php echo $row['ID'] ?>')"><i class="material-icons prefix">shopping_cart</i></button>
                    
                  </div>
                  <div class="card-content">
                    <span class="card-title"> <?php echo $row['Name'] ?></span>
                    
                    <div id="truncateLongTexts">
                      <p><?php echo $row['short description'] ?></p>
                      <input style="width: 25%; float: left; height: 22px; text-align: center;"  id="qty_<?php echo $row["ID"]; ?>" type="text" name="quantity" value="1" size="2" />
                      <p style="text-align: right;"><?php echo '€'. $row['Price'] ?></p>
                    </div>

                  </div>
                  <div class="card-action">
                   <a style="cursor: pointer;"onclick="getmodal(<?php echo $row['ID'] ?>)">lees meer</a>
                   <!-- <a href="productDetail.php?id=<?php echo $row['ID'] ?>">lees meer</a> -->
                 </div>
                 
               </div>
             </div>
            
             <?php
           }
         } 
         ?>
       </div>
       <div id="modal1" class="modal">
        <div class="modal-content">
          <div id="modal_content" class="row">
          </div>
          <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Nice!</a>

          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
<?php 
include 'footer.php';
?>
