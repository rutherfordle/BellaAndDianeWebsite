<!doctype html>
<html lang = "en">
<head>
	<meta charset="utf-8" />
	<script src="js/javascript.js"></script>
	<title>Diana's Website</title>
	<link rel = "stylesheet" href = "css/main.css">
</head>
<body>

	<div id = "headerdiv">
		<header id = "header">
			<h1 id="head">Diana's Website</h1>
			<h2><a id ="cart" href = "cart.php">Shopping Cart</a></h2>
		</header>
	</div>
	<div id = "big_wrapper">
		<nav id = "top_menu">
			
				<a id="navhome" href = "index.php">Home</a>
				<a id="navclients" href = "clients.php">New clients</a>
				<a id="navcatalog" href = "catalog.php">Catalog</a>
				<a id="navteam" href = "team.php">Meet the team</a>
				<a id="navcontact" href = "contacts.php">Contact us</a>		
		</nav>	
				<?php
				require 'core.php';
				require 'connect.php';


				if (loggedin()){
					$username =  ($_SESSION['username']);
					header ('Location: purchase.php');
				}else{
					echo '<form METHOD="LINK" ACTION="loginpurchase.php">
					Log in <br>
					<input TYPE="submit" VALUE="Log in">
					</form>';
				}
				?>

<form METHOD="LINK" ACTION="registeredpurchase.php">
New user? <br>
<input TYPE="submit" VALUE="Register">
</form>
		<footer id = "footer">
		Copyright Ruther & Ford 2013
		</footer>
	</div>
</body>
</html>
