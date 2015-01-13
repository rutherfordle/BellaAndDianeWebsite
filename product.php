
<?php
include'shopping_cart.class.php';
require 'core.php';
require 'connect.php';
				
	$id = $_GET["id"];
	$count = $_GET["count"];
	$Cart = new Shopping_Cart('shopping_cart');
	$Cart->setItemQuantity($id, 1);
	$Cart->save();
	header ('Location: cart.php');
	
?>