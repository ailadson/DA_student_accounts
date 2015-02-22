<?php
require('helpers.php');
session_start();

$_SESSION['state'] = "password";
$username = $_SESSION['username'];
$profile = unserialize($_SESSION['profile']);
$noPW = false;

if(isset($_POST['pw']) && isset($_POST['confirm'])){
    if($_POST['pw'] == $_POST['confirm']){
        $profile['password'] = $_POST['pw'];
        $profile['isPasswordSet'] = true;
        saveProfile($username,$profile);
        
        $_SESSION['state'] = "loggedIn";
        header('Location: home.php');
        die();
    } else {
        $noPW = true;
    }
}
?>
<html>
<head>
    <style>
        #title{
            font-size: 2em;
        }
        
        form{
        margin: 1em;
        }
        input{
            margin-bottom: .5em;
        }
        #warning {
            font-size: 1em;
            color: red;
        }
    </style>
</head>
<body>
    <div id="title">Please set your password</div>
    <br>
    <form method="POST" action="password.php">
        <?php 
        if($noPW == true){
            $warning = "<div id='warning'>Passwords do not match</div>";
            echo $warning;
        }
        ?>
        New Password: <input type="password" name="pw" >
            <br>
        Confirm Password: <input type="password" name="confirm">
            <br>
        <input type="submit" value="RESET PASSWORD" name="submit">
    </form>
</body>
</html>