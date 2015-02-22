<?php
    session_start();
    require('helpers.php');

    $profile = getProfile($_SESSION['username']);    
    
    if(in_array($_POST['name'], $profile['surveysTaken'])){
        echo("taken");
    } else {
        $length = sizeof($profile['surveysTaken']);
        $profile['surveysTaken'][$length] = $_POST['name'];
        saveProfile($_SESSION['username'], $profile);
    }
    
?>