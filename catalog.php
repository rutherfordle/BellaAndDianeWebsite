<!doctype html>
<html lang = "en">
<head>
	<meta charset="utf-8" />
	<script src="js/javascript.js"></script>
	<title>Diana's Website</title>
	<link rel = "stylesheet" href = "css/main.css">
</head>
<body>
	<div id = "big_wrapper">
	<div id="first_div"align=left>
		<section id = "header">
			<h1 id="head" align=left>Diana's Website</h1></section>
			<aside id="login">
				<?php
				require 'core.php';
				require 'connect.php';


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
				<a id="highlight" href = "catalog.php">Our Deals</a>
				<a id="navteam" href = "team.php">Meet the Team</a>
				<a id="navcontact" href = "contacts.php">Contact Us</a>		
		</ul>
		</nav>
		<nav id = "bottom_menu">
				<a id="navfamily" href = #>Family Fun & Entertainment</a>
				<a id="navgolf" href = #>Golf Courses</a>
				<a id="navdining" href = #>Dining Restaurants</a>
				<a id="navspa" href = #>Day Spa, Salons & Wellness</a>
				<a id="navcar" href = #>Car Care</a>
				<a id="navtravel" href = #>Travel</a>
				<a id="navextra" href = #">Extra Offers</a>
		</nav>
		</header>
		<div id = "cat_wrapper">
<?php
	include('shopping_cart.class.php');

	$query = "SELECT * FROM `picture`,`description` 
	WHERE `picture`.`imgname` = `description`.`desc_name`";
	if ($query_run = mysql_query($query)){
		while($query_row = mysql_fetch_assoc($query_run)) {
		//for ($i = 1; $i <= $max && $query_row = mysql_fetch_assoc($query_run); $i++) {
			$picture = $query_row ['imgname'];
			$desc = $query_row ['desc'];
			$id = $query_row ['order_code'];
			$imgname = $query_row ['imgname'];

				echo '<div id="catalog"><section id="picture"><IMG SRC="http://localhost/series/session/images/'.$picture. '" BORDER=0 HEIGHT=140" WIDTH="100"></section>
			<aside id="desc">' .$desc. '</a></aside><aside id="buy">
			<form method="post" action="product.php?id='.$id.'">
			<input type="submit" name="submit" value="Add to cart" />
			</form></aside><br><br></div>';
		}
	} else {
		echo mysql_error();
		}
?>

		<footer id = "footer">
		Copyright Ruther & Ford 2013
			</footer>
		</div>
	</div>
</body>
</html>