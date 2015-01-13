<?php
	require 'core.php';
	require 'connect.php';
	include('shopping_cart.class.php');
	$Cart = new Shopping_Cart('shopping_cart');


			if ( $Cart->hasItems() ) : 

					
						$order = '';
						
						foreach ( $Cart->getItems() as $order_code=>$quantity ) :
					
						
							$order = $order.$quantity.' '; 
							$order = $order.$Cart->getItemName($order_code).' '; 
							$order = $order.'('.$order_code.')<br>'; 
							
						
					 endforeach;
				
			

			else: 
				echo 'You have no items in your cart.';
			endif;

$to = "sle3pyhead@gmail.com";
$username =  ($_SESSION['username']);
$product = $Cart->getItemName($order_code);
$subject = $username.'<br>';
$body =  "$order";
echo $subject;
echo $body;
if (mail($to, $subject, $body)) {
	echo("<p>Message successfully sent!</p>");
}else {
	echo("<p>Message delivery failed...</p>");
}
echo 'purchase is complete';
?>
