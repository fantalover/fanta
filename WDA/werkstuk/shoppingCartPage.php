<?php
session_start();
include "database/getproductByID.php";
include "shoppingCartLogic.php";
include 'header.php';
		?>
		<html>
		<head>

		</head>
		<body>


			<div id="container" class="container">
				<div id="content">
					<h1>Shopping cart</h1>
					<div class="row">
						<?php

						$totalPrice = 0.00;
						if(isset($_SESSION["cart_item"])){
							foreach ($_SESSION["cart_item"] as $item) { 
								$test = getelementbyid($item['code']);
								while ($testing = $test->fetch_assoc()){
									?>
									<div class="col s3">
										<div class="card">

											<div class="card-image">
												<img width="175" height="200" src="data:image/jpeg;base64,<?php echo base64_encode( $testing['Image'] ); ?>" />
											</div>
											<div class="card-content">
												<span class="card-title"> <?php echo $item["Name"] ?></span>

												<div id="truncateLongTexts"> 
													<!--<input style="width: 25%; float: left; height: 22px; text-align: center;" id="quantityBtn" onBlur="saveCart(this);" type="text" name="quantity" value="<?php echo $item['quantity'] ?>" size="2" />-->
													<div>Quantity: <input style="text-align: center" type="text" name="quantity" id="<?php echo $item["code"]; ?>" value="<?php echo $item["quantity"]; ?>" size="2" onBlur="saveCart(this);" /></div>


													<p style="text-align: right;"><?php echo "€".$item["price"]; ?></p>
												</div>

											</div>
											<div class="card-action">

												<div class="btnRemoveAction" id="remove<?php echo $item["code"]; ?>"><a href="shoppingCartPage.php?action=remove&id=<?php echo $item["code"]; ?>" title="Remove from Cart">remove from cart</a></div>
											</div>

										</div>
									</div>

									<?php

									$totalPrice += $item['quantity']*$item['price']; 
								}
							}
						} 
						?>
					</div>
					<p id="total_price"> Total price of all articles: €<?php echo $totalPrice;?></p>

					<a class="waves-effect waves-light btn" href="shoppingCartPage.php?action=empty">empty the shopping cart</a>
					<?php 
						if (!empty($_SESSION["ID"]))  {
					?>
					<a class="waves-effect waves-light btn" href="checkout.php">Go to checkout</a>
					<?php 
						}
						else{
							?>
								<a class="waves-effect waves-light btn" href="Login.php">Please log in to continue</a>
							<?php
						}
					?>
					



				</div>
			</div>


		</body>
		</html>

		<?php
		include 'footer.php';
		?>