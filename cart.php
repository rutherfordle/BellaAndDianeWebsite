<?php
	require 'core.php';
	require 'connect.php';
	include('shopping_cart.class.php');
	$Cart = new Shopping_Cart('shopping_cart');
?>
<html lang = "en">
<head>
	<meta charset="utf-8" />
		<title>Shopping Cart</title>
		<script src="js/jquery-1.2.6.pack.js" type="text/javascript"></script>
		<script src="js/jquery.color.js" type="text/javascript"></script>
		<script src="js/thickbox.js" type="text/javascript"></script>
		<script src="js/cart.js" type="text/javascript"></script>
		<link href="css/cart.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="css/thickbox.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>

	<div id = "big_wrapper" align=center>
	<div id="first_div"align=left>
		<section id = "header">
			<h1 id="head" align=left>Diana's Website</h1></section>
			
			<aside id="login">
				<?php


				if (loggedin()){
					$username =  ($_SESSION['username']);
					echo $username. ' logged in<br> <a id="cart" href="logout.php">Log out</a>';
				}else{
					echo '<a id="cart" href="logincheck.php">Log in</a>';
				}
				?>
			
			<a id ="cart" href = "cart.php"></br>Shopping Cart</a></aside>
		
		</div>

		<nav id = "top_menu">
			<ul>
				<a id="navhome" href = "index.php">Home</a>
				<a id="navabout" href = "aboutus.php">About Us</a>
				<a id="navclients" href = "clients.php">New Clients</a>
				<a id="navcatalog" href = "catalog.php">Our Deals</a>
				<a id="navteam" href = "team.php">Meet the Team</a>
				<a id="navcontact" href = "contacts.php">Contact Us</a>		
		</ul>
		</nav>
		<nav id = "bottom_menu">

		</nav>
		</header>
		<div id = "small_wrapper">
			<h1>Shopping Cart</h1>
			<?php if ( $Cart->hasItems() ) : ?>
			<form action="cart_action.php" method="get" align=right>
				<table id="cart1">
					<tr>
						<th>Quantity</th>
						<th>Item</th>
						<th>Order Code</th>
						<th>Remove</th>
					</tr>
					<?php
						$i = 0;
						foreach ( $Cart->getItems() as $order_code=>$quantity ) :
					?>
						<?php echo $i++%2==0 ? "<tr>" : "<tr class='odd'>"; ?>
							<td class="quantity center"><input type="text" name="quantity[<?php echo $order_code; ?>]" size="3" value="<?php echo $quantity; ?>" tabindex="<?php echo $i; ?>" /></td>
							<td class="unit_price"><?php echo $Cart->getItemName($order_code); ?></td>
							<td class="order_code"><?php echo $order_code; ?></td>
							<td class="remove center"><input type="checkbox" name="remove[]" value="<?php echo $order_code; ?>" /></td>
						</tr>
					<?php endforeach; ?>
				</table>
				<input type="submit" name="update" value="Update cart" />
			</form>
			<form METHOD="LINK" ACTION="loginpurchase.php"align=right>
			<input TYPE="submit" VALUE="Check Out">
			</form>
			<?php else: ?>
				<p class="center">You have no items in your cart.</p>
			<?php endif; ?>
	<footer id = "footer">
	Copyright Ruther & Ford 2013
	</footer>
	</div>
	</div>
</body>
</html>