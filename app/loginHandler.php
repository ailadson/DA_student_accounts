<?php 
session_start();
//make sure there are no blank fields
if(!isset($_POST["username"]) || !isset($_POST["password"])){
    header("Location: login.php");
    die();
}

//get helper functions
require('helpers.php');

//get username and password
$username = $_POST["username"];
$password = $_POST["password"];

//get accounts info from google sheets api
$accounts = json_decode(file_get_contents('http://spreadsheets.google.com/feeds/list/1d6Lu_uEMmdsjDmQVHYBNcK99s9wvgLVyFugZm-RmIU0/10/public/basic?alt=json'), true)["feed"]["entry"];

//login returns an object in username exists, otherwise false
$login = verifyUsername($username, $accounts);

//if the login couldn't be verified, reject user
if($login == false){
    require('loginDenied.php');
}

//get the profile json of user, or create it if this is the first login
if(!file_exists(getProfilePath($username))){
    $template = file_get_contents("data/profiles/template.json");
    $profile = json_decode($template, true);
    saveProfile($username,$profile);
} else {
    $profile = getProfile($username);
}

//check the password if it has been set
if($profile["isPasswordSet"]){
    if($profile["password"] != $password){
        require('loginDenied.php');
    }
} else if($password != "-"){
    require('loginDenied.php');
}

//store profile in session
$_SESSION['username'] = $username;
$_SESSION['profile'] = serialize($profile);
$_SESSION['login'] = serialize($login);
$_SESSION['state'] = "loggedIn";

//redirect to either the accounts or to the password setting page
if($profile["isPasswordSet"]){
    $url = "home.php";
} else {
    $url = "password.php";
}

header('Location: ' . $url);
die();

?>