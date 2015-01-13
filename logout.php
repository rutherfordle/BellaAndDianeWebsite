<?php
require 'core.php';
unset ($_SESSION['username']);
header('Location: '.$http_referer);
?>