<?php
session_start();
include 'database/connection.php';
include 'database/getProductDetail.php';
include 'database/getID.php';
include 'database/Get4randomproductInCategory.php';
include 'database/getProductsByCategory.php';






if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$name = $row['Name'];
		$idd = GetId($name);
		$randomresult = getRandom($idd);
		?>
		<div class="card">
			<h4 id="modal_title"><?php echo $row['Name'] ?></h4>
			<h4 id="modal_price"><?php echo '€'. $row['Price'] ?></h4>
			<div class="card-image" style="width: 225px; height: 250px;">
				<img id="modal_image" width="225" height="250" src="data:image/jpeg;base64,<?php echo base64_encode( $row['Image'] ); ?>" />
				<button  id="add_<?php echo $row["ID"]; ?>"  class="btnAddAction btn-floating halfway-fab waves-effect waves-light red" onClick = "cartAction('add','<?php echo $idd ?>')"><i class="material-icons prefix">shopping_cart</i></button>
			</div>
			<br>
			<div class="card-content" >
				<p><?php echo $row['Description'] ?></p>
				<!--*************begin of rating system************-->

				<?php if (!empty($_SESSION["ID"]))  {?>
				<h5>Give a rating</h5>
				<form method="POST" action="">
					<fieldset>
						<span class="star-cb-group">
							<input type="text" hidden="hidden" name="ProductID" value="<?php echo $idd ?>">
							<input type="radio" id="rating-5" name="rating" value="5" /><label for="rating-5">5</label>
							<input type="radio" id="rating-4" name="rating" value="4" /><label for="rating-4">4</label>
							<input type="radio" id="rating-3" name="rating" value="3" checked="checked"/><label for="rating-3">3</label>
							<input type="radio" id="rating-2" name="rating" value="2" /><label for="rating-2">2</label>
							<input type="radio" id="rating-1" name="rating" value="1" /><label for="rating-1">1</label>
						</span>
					</fieldset>
					<br>
					<textarea name="comment"></textarea>
					<input type="submit" name="RatingForm" value="Leave a rating and a comment" class="btn ">
				</form>
				<br>
				<?php } ?>




				<!--*************end of rating system************-->
				<p id="modal_category"><small><?php echo $row['Category']?></small></p>
			</div>
		</div>



		<?php

		if ($randomresult->num_rows > 0) {
			while($randomRow = $randomresult->fetch_assoc()) { 
				?>

			<div id="cardHeader" class="col s3" onclick="getmodal(<?php echo $randomRow['ID'] ?>)">
				<div class="card">

					<div class="card-image">
						<img width="175" height="200" src="data:image/jpeg;base64,<?php echo base64_encode( $randomRow['Image'] ); ?>" />
					</div>
					<div class="card-content">
						<span class="card-title"> <?php echo $randomRow['Name'] ?></span>

						<div id="truncateLongTexts">
							<p><?php echo $randomRow['short description'] ?></p>
							<p style="text-align: right;"><?php echo '€'. $randomRow['Price'] ?></p>
						</div>

					</div>
				</div>
			</div>
			<?php
		}
	}
}
}?>