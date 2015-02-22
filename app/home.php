<?php
session_start();

//make sure the user belongs here
if(!isset($_SESSION['state']) || $_SESSION['state'] != "loggedIn"){
//    $url='login.php';
//    header('Location: ' . $url);
    echo "0";
    die();
}

require('helpers.php');

//get the user info
$username = $_SESSION['username'];
$profile = unserialize($_SESSION['profile']);
$login = unserialize($_SESSION['login']);


//update login counter
$profile['loginCounter'] += 1;
saveProfile($username, $profile);

//get sheets url
$path = 'secrets/driveSheets.json';
$sheets = json_decode(file_get_contents($path), true);

//get data from google sheets
$challenges = json_decode(file_get_contents($sheets["challenges"]), true)["feed"]["entry"];
$challengeInfo = json_decode(file_get_contents($sheets["challengeInfo"]), true)["feed"]["entry"];
$surveyInfo = json_decode(file_get_contents($sheets["surveyInfo"]), true)["feed"]["entry"];

//pack and format data for content array
$content = packChallenges($login, $challenges);
$content = packChallengeInfo($content, $challengeInfo);
$content["surveyInfo"] = packSurveyInfo($surveyInfo);

//attach profile to content array
$content["profile"] = $profile;
    
define('ACCESS_ALLOWED', 1); //need access
require('account.php');
?>