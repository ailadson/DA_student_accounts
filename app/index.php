<?php
define('ACCESS_ALLOWED', 1); //need access
require('config.php');

session_start();

$_SESSION['state'] = "none";
$url='login.php';
header('Location: ' . $url);
die();
?>