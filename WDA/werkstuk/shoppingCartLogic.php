<?php
if(!empty($_POST["action"])) {
	if($_POST["action"] =="add"){
		echo "add";
		if(!empty($_POST["quantity"])) {
			while ($productByCode = $getByIdResult->fetch_assoc()) {
				$itemArray = array($productByCode["ID"]=>array('Name'=>$productByCode["Name"], 'code'=>$productByCode["ID"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode["Price"]));
			}
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode["ID"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $key => $value) {
						if($productByCode["ID"] == $key){
							$_SESSION["cart_item"][$key]["quantity"] = $_POST["quantity"];

						}

					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	}}
	if(!empty($_GET["action"])) {
		if ($_GET["action"] == "remove") {
			if(!empty($_SESSION["cart_item"])) {
				foreach($_SESSION["cart_item"] as $key => $value) {
					$ko = $value['code'];
					if($_GET["id"] == $ko){
						unset($_SESSION["cart_item"][$key]);
					}
					if(empty($_SESSION["cart_item"])){
						unset($_SESSION["cart_item"]);
					}
				}
			}
		}

		elseif ($_GET["action"] == "edit") {
			
			$total_price = 0;
			$ap = 0;
			$aq = 0;
			$temp = 0;
			if(!empty($_SESSION["cart_item"])) {
				foreach ($_SESSION['cart_item'] as $key => $value) {
					$km = $value['code'];
					if($_POST["code"] == $km) {
						if($_POST["quantity"] != '0') {
							$_SESSION['cart_item'][$key]["quantity"] = $_POST["quantity"];
						} 
					}
					$total_price += $_SESSION['cart_item'][$key]["price"] * $_SESSION['cart_item'][$key]["quantity"];	

				}
				if($total_price!=0 && is_numeric($total_price)) {
					print "Total price of all articles: €" . number_format($total_price,2);
					exit;
				}
			}}


			elseif ($_GET["action"] == "empty") {
				unset($_SESSION["cart_item"]);
			}
		}

		?>