<!doctype html>
<html lang = "en">
<head>
	<meta charset="utf-8" />
	<script src="js/javascript.js"></script>
	<title>Diana's Website</title>
	<link rel = "stylesheet" href = "css/main.css">
</head>
<body>

	<div id = "big_wrapper" align=center>
	<div id="first_div"align=left>
		<section id = "header">
			<h1 id="head" align=left>Diana's Website</h1></section>
			
			<aside id="login">
			
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
				<?php
				require 'core.php';
				require 'connect.php';
						
				if (isset($_POST['username']) && isset($_POST['password'])){
				$username = $_POST['username'];
				$password = $_POST['password'];
				$passwordmd5 = md5($password);
					
				//$password_hash =($password);

					if (!empty($username) && !empty($password)){

						$query = "SELECT * FROM `user` WHERE `user` = '$username' AND `password` = '$passwordmd5'";
						if ($query_run = mysql_query($query)){
						
							$query_num_rows = mysql_num_rows($query_run);
						if($query_num_rows == 0) {
							echo 'Either wrong username or password.';
							}else if($query_num_rows == 1){
							$newdate = strtotime ("-2 week");
							$newdate = date("Y-m-d", $newdate);
							
							$created =  mysql_result($query_run, 0, 'created');
							if ($newdate <= $created){
								$user =  mysql_result($query_run, 0, 'user');
								echo $user;
								$_SESSION['username'] = $user;
								header ('Location: purchase.php');
								}else{echo 'Code has expired';}
							}
						}
					}else{
					echo 'Username and password required';
					}
				}
				?>
<form action = "<?php echo $current_file; ?>" method = "POST">
Username: <input type = "text" name = "username"><br>Password: <input type = "password" name = "password"><br>
<input type = "submit" value = "Log in"> 
</form>
<form METHOD="LINK" ACTION="registeredpurchase.php">
New user? <br>
<input TYPE="submit" VALUE="Register">
</form>
		<footer id = "footer">
		Copyright Ruther & Ford 2013
		</footer>
		</div>
	</div>
</body>
</html>
