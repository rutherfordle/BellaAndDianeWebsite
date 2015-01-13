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
				<a id="navcatalog" href = "catalog.php">Our Deals</a>
				<a id="navteam" href = "team.php">Meet the Team</a>
				<a id="navcontact" href = "contacts.php">Contact Us</a>		
		</ul>
		</nav>
		<nav id = "bottom_menu">

		</nav>
		</header>
		<div id = "sub_wrapper">
		<?php
		if (isset($_POST['code']) && isset($_POST['name']) && 
			isset($_POST['password'])&& isset($_POST['confirm'])&& 
			isset($_POST['first'])&& isset($_POST['last'])&& 
			isset($_POST['company'])&& 
			isset($_POST['email'])&& isset($_POST['address']) && 
			isset($_POST['address2']) && isset($_POST['state']) &&
			isset($_POST['zip']))
				{
					$code = $_POST['code'];
					$username = $_POST['name'];
					$password = $_POST['password'];
					$confirm = $_POST['confirm'];
					$first = $_POST['first'];
					$last = $_POST['last'];
					$company = $_POST['company'];
					$email = $_POST['email'];
					$address = $_POST['address'];
					$address2 = $_POST['address2'];
					$state = $_POST['state'];
					$zip = $_POST['zip'];
					
					if (!empty($code) && !empty($username)&& !empty($password)&& !empty($confirm)){
					if ($password != $confirm){echo 'Password does not match';}
						else{
						$passwordmd5 = md5($password);
						$query = "SELECT * FROM `user` WHERE `user` = '$username' OR `code` = '$code'";
						if ($query_run = mysql_query($query)){
							$query_num_rows = mysql_num_rows($query_run);
						if($query_num_rows == 0) {
							echo 'Wrong activation code.';
						}else if($query_num_rows == 1){
							$newdate = strtotime ("-2 week");
							$newdate = date("Y-m-d", $newdate);
							$created =  mysql_result($query_run, 0, 'created');
							if ($newdate <= $created){
								$query = "INSERT INTO `user` VALUES ('','".mysql_real_escape_string($created)."','".mysql_real_escape_string($username)."',
								'".mysql_real_escape_string($code)."','".mysql_real_escape_string($passwordmd5)."',
								'".mysql_real_escape_string($first)."','".mysql_real_escape_string($last)."',
								'".mysql_real_escape_string($company)."','".mysql_real_escape_string($email)."',
								'".mysql_real_escape_string($address)."','".mysql_real_escape_string($address2)."',
								'".mysql_real_escape_string($state)."','".mysql_real_escape_string($zip)."')";
								if ($query_run = mysql_query ($query)) {
								$_SESSION['username'] = $username;
								header ('Location: purchase.php');
								} else{
								echo 'Cannot register you at this time';
								}
							}else{echo 'Code has expired';}
							}$user =  @mysql_result($query_run, 0, 'user');
							if ($user == $username){
							goto
							this()
							goto()
							this
								echo '*Username already exist';
								}
							}
						}
					}else{
					echo 'One of the * fields are not filled.';
					}
				}
		?>
	<div  id="questions">
		<form action = "<?php echo $current_file; ?>" method = "POST" align=right>
		<h3>*Activation code: <input type = "text" name = "code"></h3><br>
		<h3>*Username: <input type = "text" name = "name"></h3><br>
		<h3>*Password: <input type = "password" name = "password"></h3><br>
		<h3>*Confirm: <input type = "password" name = "confirm"></h3><br>
		<h3>First Name: <input type = "text" name = "first"></h3><br>
		<h3>Last Name: <input type = "text" name = "last"></h3><br>
		<h3>Company: <input type = "text" name = "company"></h3><br>
		<h3>E-mail: <input type = "text" name = "email"></h3><br>
		<h3>Address: <input type = "text" name = "address"></h3><br>
		<h3>Address(2): <input type = "text" name = "address2"></h3><br>
		<h3>State: <input type = "text" name = "state"></h3><br>
		<h3>Zip code: <input type = "text" name = "zip"></h3><br>
		<input type = "submit" value = "Submit"> 
		</form>
		</div>
		<footer id = "footer">
		Copyright Ruther & Ford 2013
		</footer>
		</div>
	</div>
</body>
</html>