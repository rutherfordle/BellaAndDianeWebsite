<?php
require 'core.php';
require 'connect.php';


if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
	$username =  ($_SESSION['username']);
	echo $username. ' logged in';
	}else{
include 'login.php';
}

?>