<?php
ob_start();
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];
@$http_referer = $_SERVER['HTTP_REFERER'];

function loggedin(){
if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
	return true;
	}else
	return false;
}
?>