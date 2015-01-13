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
				<a id="highlight" href = "aboutus.php">About Us</a>
				<a id="navclients" href = "clients.php">New Clients</a>
				<a id="navcatalog" href = "catalog.php">Our Deals</a>
				<a id="navteam" href = "team.php">Meet the Team</a>
				<a id="navcontact" href = "contacts.php">Contact Us</a>		
		</ul>
		</nav>
		<nav id = "bottom_menu">
				<a id="navwho" href = #>The Who</a>
				<a id="navwhat" href = #>The What</a>
				<a id="navwhy" href = #>The Why</a>
				<a id="navwhen" href = #>The When</a>
				<a id="navhow" href = #>The How</a>
		</nav>
		</header>
		<div id = "cat_wrapper">
		
		<footer id = "footer">
		Copyright Ruther & Ford 2013
			</footer>
		</div>
	</div>
</body>
</html>