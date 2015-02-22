<?php 

require('access.php'); 

?>

<!DOCTYPE html>
<html>

<head>
    <?php require('html/headMarkup.html'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link type="text/css" rel=stylesheet href="css/account.css">
    <link rel="import" href="components/core-drawer-panel/core-drawer-panel.html">
    <link rel="import" href="components/core-header-panel/core-header-panel.html">
    <link rel="import" href="components/snippet-panel/snippet-panel.html">
    <link rel="import" href="components/challenges-mainContent/challenges-mainContent.html">
    <link rel="import" href="components/rewards-mainContent/rewards-mainContent.html">
    <link rel="import" href="components/survey-mainContent/survey-mainContent.html">
    <link rel="import" href="components/home-mainContent/home-mainContent.html">
</head>

<body unresolved>
    <core-drawer-panel>
        <core-header-panel drawer id="drawer">
            <core-toolbar id="toolbar_drawer">
                <img src="imgs/logo.png" id="logo">
            </core-toolbar>
            <snippet-panel id="challenges"></snippet-panel>
            <snippet-panel id="rewards"></snippet-panel>
            <snippet-panel id="surveys"></snippet-panel>
            <snippet-panel id="portfolio"></snippet-panel>
        </core-header-panel>
        <core-header-panel main id="main">
            <core-toolbar id="toolbar_main">
                <span><?php echo explode(" ",$_SESSION["username"])[0]."'s "; ?>Digital Atelier Dashboard</span>
            </core-toolbar>
                <home-mainContent id="home-mainContent"></home-mainContent>
                <challenges-mainContent id="challenges-mainContent" class="hidden"></challenges-mainContent>
            <div id="rewards-mainContent" class="hidden">
                <p>Coming Soon!</p>
                <p>You'll be able to track your progress and claim your awards online.</p>
            </div>    
            <rewards-mainContent id="rewards-mainContent" class="hidden"></rewards-mainContent>
                <survey-mainContent id="surveys-mainContent" class="hidden"></survey-mainContent>
        </core-header-panel>
    </core-drawer-panel>
</body>
<script src="script/account.js" type="text/javascript"></script>
<script>
    
    window.addEventListener('polymer-ready', function(e) {
        var content = <?php echo json_encode($content) ?>;
        console.log(content);
        var myAccount = new Account(content);
    });
    
</script>
</html>