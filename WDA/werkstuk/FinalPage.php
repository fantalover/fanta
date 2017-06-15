<?php
session_start();
include 'header.php';
include "database/getproductByID.php";

?>
<div id="container" class="container">
	<div id="content">
		<h1>Overview</h1>
		<div class="row">
		<h5>items</h5>
		<table>
			<thead>
				<tr>
					<th>Name</th>
					<th>Quantity</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
			<?php
			//var_dump($_SESSION);
			if(isset($_SESSION["cart_item"])){
				foreach ($_SESSION["cart_item"] as $item) { 
					$test = getelementbyid($item['code']);
					while ($testing = $test->fetch_assoc()){
						
						?>


							<tr>
								<td><?php echo $item["Name"]?></td>
								<td><?php echo $item["quantity"]?></td>
								<td>€<?php echo $item["price"] ?></td>
							</tr>
						
					

						<?php

					}
				}
			} 
			?>
			</tbody>
		</table>
	</div>
	<div class="row">
		<h5>Factuuradres</h5>
		<?php 
		if(isset($_SESSION["Factuuradres"])){
		?>
			<p>Street:  <?php echo $_SESSION["Factuuradres"]["Street"]; ?></p>
			<p>HouseNumber:  <?php echo $_SESSION["Factuuradres"]["HouseNumber"]; ?></p>
			<p>City:  <?php echo $_SESSION["Factuuradres"]["City"]; ?></p>
			<p>PostalCode:  <?php echo $_SESSION["Factuuradres"]["PostalCode"]; ?></p>
		<?php
		
		}

		?>
	</div>
		<div class="row">
		<h5>Leveradres</h5>
		<?php 
		if(isset($_SESSION["Leveradres"])){
		?>
			<p>Street:  <?php echo $_SESSION["Leveradres"]["StreetL"]; ?></p>
			<p>HouseNumber:  <?php echo $_SESSION["Leveradres"]["HouseNumberL"]; ?></p>
			<p>City:  <?php echo $_SESSION["Leveradres"]["CityL"]; ?></p>
			<p>PostalCode:  <?php echo $_SESSION["Leveradres"]["PostalCodeL"]; ?></p>
		<?php
		
		}
	
		?>
	</div>
	<div class="row">
	    <h5>Delivery option</h5>
		<p>Delivery option: <?php echo $_SESSION["delivery"]?></p>
	</div>
	<div class="row">
	    <h5>Betalingsmethode</h5>
		<p>Betalingsmethode: <?php echo $_SESSION["betaling"]?></p>
	</div>
	<a href="checkout.php">Go back</a>
	<a href="success.php">Confirm</a>


</div>
</div>
<?php 
include 'footer.php';
?>