<?php
$error = 'Could not connect. Please conact server Admin.';
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = '';
$mysql_db = 'it_database';

 if(!@mysql_connect($mysql_host,$mysql_user,$mysql_password)||!@mysql_select_db($mysql_db)){
	die($error);
}

?>