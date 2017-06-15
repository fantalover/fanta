<?php 
include 'header.php';
include 'database/getProductDetail.php';
include 'database/getID.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>product detail pagina</title>
</head>


<body>
  <div class="container">
   <?php
   if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $name = $row['Name'];
      $idd = GetId($name);
      ?>






      <div class="row">
        <div class="col s12"><h4 id="modal_title"><?php echo $row['Name'] ?></h4><h4 id="modal_price"><?php echo '€'. $row['Price'] ?></h4></div>
        <div class="col s12 m4 l4"><img id="modal_image" width="225" height="250" src="data:image/jpeg;base64,<?php echo base64_encode( $row['Image'] ); ?>" /></div>
        <div class="col s12 m4 l10">


          <p><?php echo $row['Description'] ?></p>
          <p id="modal_category"><small><?php echo $row['Category']?></small></p>
           <a id="add_<?php echo $row["ID"]; ?>" style="float: right; margin-top: -2em;" onClick = "cartAction('add','<?php echo $idd ?>')" class="waves-effect waves-light btn"><i class="material-icons prefix">shopping_cart</i>add to shopping cart</a>
          <!-- <a id="add_<?php echo $row["ID"]; ?>" style="float: right; margin-top: -2em;" onClick = "test(<?php echo GetId($name); ?>)"><i class="material-icons prefix">shopping_cart</i>add to shopping cart</a> -->
        </div>
        <?php }}?>
      </div>
    </div>
  </body>




  </html>
  <?php 
  include 'footer.php';
  ?>
  <script type="text/javascript">
    function test(id){
      console.log(id);
    }
  </script>
