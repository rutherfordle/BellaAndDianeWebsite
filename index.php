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
				<a id="highlight" href = "index.php">Home</a>
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
	<div id="img" align=center>
		<IMG SRC="images/Domo this.jpg" NAME="slideshow" BORDER=0 HEIGHT="400" WIDTH="100%">
		<FORM NAME="show">
		<INPUT TYPE="text" WIDTH="100"
		NAME="imgtitle" VALUE="DOMO!!!!!">
		</FORM>
			
			<form METHOD="LINK" ACTION="JavaScript:slideshowBack()">
			<input TYPE="submit" VALUE="Back">
			<METHOD="LINK" ACTION="JavaScript:slideshowUp()">
			<input TYPE="submit" VALUE="Next">
			</form>
		<SCRIPT LANGUAGE="JavaScript"> 
		var num=1
		setInterval(slideshowUp, 5000);
		img1 = new Image ()
		img1.src = "images/Domo this.jpg"
		img2 = new Image ()
		img2.src = "images/lego.png"

		text1 = "DOMO!!!!!"
		text2 = "Troll"

		function slideshowUp()
		{
			num=num+1
			if (num==3)
			{num=1}
			document.slideshow.src=eval("img"+num+".src")
			document.show.imgtitle.value=eval("text"+num)
		}

		function slideshowBack()
		{
			num=num-1
			if (num==0)
			{num=2}
			document.slideshow.src=eval("img"+num+".src")
			document.show.imgtitle.value=eval("text"+num)
		}
		</script>
	</div>
	<div id="new_div"align=left>
	<section id = "main_section">
		<article>
			<header>
				<hgroup>
					<h1>Article 1</h1>
					<h2>Subtitle</h2>
				</hgroup>
			</header>
			<p name = "art1">Enter somethng here.</p>
			<footer>
				<p>- written by Rutherford Le</p>
			</footer>
		</article>
	</section>
	
	<aside id = "side">
		<h4 id="tab">Information</h4>
		This and that.
	</aside>
	
	</div>
	
	<footer id = "footer">
	Copyright Ruther & Ford 2013
	</footer>
	</div>
	</div>
</body>
</html>