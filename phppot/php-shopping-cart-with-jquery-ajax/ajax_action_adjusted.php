<?php
session_start();
include "database/getproductByID.php";

if(!empty($_POST["action"])) {
switch($_POST["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $getByIdResult;
			$itemArray = array($productByCode["id"]=>array('Name'=>$productByCode["Name"], 'code'=>$productByCode["id"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode["price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode["id"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode["id"] == $k){
								$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
								foreach ($_SESSION as $value) {
									var_dump($value);
								}
							}

					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_POST["id"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;		
}
}
?>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th><strong>Name</strong></th>
<th><strong>Code</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Price</strong></th>
<th><strong>Action</strong></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
    	var_dump($item);
		?>
				<tr>
				<td><strong><?php echo $item["Name"]; ?></strong></td>
				<td><?php echo $item["id"]; ?></td>
				<td><?php echo $item["quantity"]; ?></td>
				<td align=right><?php echo "$".$item["price"]; ?></td>
				<td><a onClick="cartAction('remove','<?php echo $item["id"]; ?>')" class="btnRemoveAction cart-action">Remove Item</a></td>
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
</tr>
</tbody>
</table>		
  <?php
}
?>