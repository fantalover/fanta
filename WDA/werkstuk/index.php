<?php 
session_start();
include 'header.php';
include 'database/getRandomProducts.php';


?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>

<body>
	<main>
		<div id="container" class="container">
			<div id="content">
				<h1>Uitgelichte producten</h1>
				<div class="row">
					<?php    
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							?>
							<div id="cardHeader" class="col s3">
								<div class="card">
									<div class="card-image">
										<img width="175" height="200" src="data:image/jpeg;base64,<?php echo base64_encode( $row['Image'] ); ?>" />
										<button  id="shoppingcartBtn" style="display: none;" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons prefix">shopping_cart</i></button>
									</div>
									<div class="card-content">
										<span class="card-title"> <?php echo $row['Name'] ?></span>
										<div id="truncateLongTexts">
											<p><?php echo $row['short description'] ?></p>
											<p style="text-align: right;"><?php echo '€'. $row['Price'] ?></p>
										</div>

									</div>
									<div class="card-action">
										<a style="cursor: pointer;"onclick="getmodal(<?php echo $row['ID'] ?>)">lees meer</a>
									</div>
								</div>
							</div>
							<?php
						}
					} 
					?>
				</div>
			</div>
			<div id="content">
				<h1>Nieuwste producten</h1>
				<div class="row">
					<?php    
					include 'database/getLatestProducts.php';
					if ($results->num_rows > 0) {
						while($row = $results->fetch_assoc()) {
							?>
							<div id="cardHeader" class="col s3">
								<div class="card">
									<div class="card-image">
										<img width="175" height="200" src="data:image/jpeg;base64,<?php echo base64_encode( $row['Image'] ); ?>" />
										<button id="shoppingcartBtn" style="display: none;" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons prefix">shopping_cart</i></button>
									</div>
									<div class="card-content">
										<span class="card-title"> <?php echo $row['Name'] ?></span>
										<div id="truncateLongTexts">
											<p><?php echo $row['short description'] ?></p>
											<p style="text-align: right;"><?php echo '€'. $row['Price'] ?></p>
										</div>

									</div>
									<div class="card-action">
										<a style="cursor: pointer;"onclick="getmodal(<?php echo $row['ID'] ?>)">lees meer</a>
									</div>
								</div>
							</div>
							<?php
						}
					} 
					?>
				</div>
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
		</main>
	</body>
	</html>

	<?php 
	include 'footer.php';
	?>