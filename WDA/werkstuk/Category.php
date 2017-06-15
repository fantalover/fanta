<?php
session_start();
include 'database/getProductsByCategory.php';
include 'database/getID.php';
?>

<div id="products" class="row">
	<?php    
	if ($getByCategoryResult->num_rows > 0) {
		while($row = $getByCategoryResult->fetch_assoc()) {
			$name = $row['Name'];
      		$idd = GetId($name);
			?>
			<div id="cardHeader" class="col s3">
				<div class="card">

					<div class="card-image">
						<img width="175" height="200" src="data:image/jpeg;base64,<?php echo base64_encode( $row['Image'] ); ?>" />

						<button disabled id="added_<?php echo $idd ?>"  class="btnAdded btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons prefix">shopping_cart</i></button>
						<button  id="add_<?php echo $idd ?>"  class="btnAddAction btn-floating halfway-fab waves-effect waves-light red" onClick = "cartAction('add','<?php echo $idd ?>')"><i class="material-icons prefix">shopping_cart</i></button>

					</div>
					<div class="card-content">
						<span class="card-title"> <?php echo $row['Name'] ?></span>

						<div id="truncateLongTexts">
							<p><?php echo $row['short description'] ?></p>
							 <input style="width: 25%; float: left; height: 22px; text-align: center;"  id="qty_<?php echo $idd ?>" type="text" name="quantity" value="1" size="2" />
							<p style="text-align: right;"><?php echo '€'. $row['Price'] ?></p>
						</div>

					</div>
					<div class="card-action">
						<a style="cursor: pointer;"onclick="getmodal(<?php echo $idd ?>);">lees meer</a>

					</div>

				</div>
			</div>

			<?php
		}
	} 
	?>
</div>





