<?php
	include('shopping_cart.class.php');
	session_start();
	$Cart = new Shopping_Cart('shopping_cart');
	
	$Cart->setItemQuantity('HSD-KSE', 2);
	$Cart->setItemQuantity('KLS-IEN', 1);
	$Cart->setItemQuantity('ELS-OWK', 4);
	
	$Cart->save();
	
	header('Location: cart.php');
?>