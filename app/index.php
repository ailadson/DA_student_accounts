<?php
define('ACCESS_ALLOWED', 1); //need access
require('config.php');

$url='login.php';
header('Location: ' . $url);
die();
?>