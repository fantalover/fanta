<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		case "remove":
			if(!empty($_SESSION["cart_item"])) {
				foreach($_SESSION["cart_item"] as $k => $v) {
						if($_GET["code"] == $k)
							unset($_SESSION["cart_item"][$k]);				
						if(empty($_SESSION["cart_item"]))
							unset($_SESSION["cart_item"]);
				}
			}
		break;
		case "empty":
			unset($_SESSION["cart_item"]);
		break;	
		case "edit":
			$total_price = 0;
			foreach ($_SESSION['cart_item'] as $k => $v) {
			  if($_POST["code"] == $k) {
				  if($_POST["quantity"] == '0') {
					  unset($_SESSION["cart_item"][$k]);
				  } else {
					$_SESSION['cart_item'][$k]["quantity"] = $_POST["quantity"];
				  }
			  }
			  $total_price += $_SESSION['cart_item'][$k]["price"] * $_SESSION['cart_item'][$k]["quantity"];	
				  
			}
			if($total_price!=0 && is_numeric($total_price)) {
				print "$" . number_format($total_price,2);
				exit;
			}
		break;	
	}
}
?>
<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart </div>
<form name="frmCartEdit" id="frmCartEdit">
<?php
$total_price = 0.00;
if(isset($_SESSION["cart_item"])){
?>	
<?php foreach ($_SESSION["cart_item"] as $item) { 
		$product_info = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code = '" . $item["code"] . "'");
		$total_price += $item["price"] * $item["quantity"];	
?>
	<div class="product-item" onMouseOver="document.getElementById('remove<?php echo $item["code"]; ?>').style.display='block';"  onMouseOut="document.getElementById('remove<?php echo $item["code"]; ?>').style.display='';" >
		<div class="product-image"><img src="<?php echo $product_info[0]["image"]; ?>"></div>
		<div><strong><?php echo $item["name"]; ?></strong></div>
		<div class="product-price"><?php echo "$".$item["price"]; ?></div>
		<div>Quantity: <input type="text" name="quantity" id="<?php echo $item["code"]; ?>" value="<?php echo $item["quantity"]; ?>" size="2" onBlur="saveCart(this);" /></div>
		<div class="btnRemoveAction" id="remove<?php echo $item["code"]; ?>"><a href="shopping_cart.php?action=remove&code=<?php echo $item["code"]; ?>" title="Remove from Cart">x</a></div>
	</div>
<?php
	}
}
?>
</form>
<div class="cart_footer_link">
<div>Total Price: <span id="total_price"><?php echo "$". number_format($total_price,2); ?></span></div>
<a href="shopping_cart.php?action=empty">Clear Cart</a>
<a href="index.php" title="Cart">Continue Shopping</a>
</div>
</div>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script>
function saveCart(obj) {
	var quantity = $(obj).val();
	var code = $(obj).attr("id");
	$.ajax({
		url: "?action=edit",
		type: "POST",
		data: 'code='+code+'&quantity='+quantity,
		success: function(data, status){$("#total_price").html(data)},
		error: function () {alert("Problen in sending reply!")}
	});
}
</script>
</BODY>
</HTML>