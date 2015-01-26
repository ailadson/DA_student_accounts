<!DOCTYPE html>
<html>

<head>
    <?php require('html/headMarkup.html'); ?>
    <link type="text/css" rel=stylesheet href="css/login.css">
    <link rel="import" href="components/login_window/login_window.html">
    <link rel="import" href="components/core-header-panel/core-header-panel.html">
</head>
    
<body>
    <core-header-panel mode="standard" style="min-width:500px;height:100%">
        <core-toolbar id="header">
            <center>
                <h1 style="padding-top: 5px;">DIGITAL ATELIER</h1>
                <h3>Student Challenge Tracker</h3>
            </center>
        </core-toolbar>
        <br>
        <br>
        <br>
        <div id="outterContainer">
            <div style="margin-left:2.4%;float:left;width:45%;padding-right:2.4%;border-right:1px solid black;">
                <br><br>
                <center>
                    <a href="https://tildenda.wordpress.com/category/challenges/" target="_blank"><button class="homeBtn" id="challengesBtn">Challenges</button></a>
                    <a href="https://tildenda.wordpress.com/leaderboard/" target="_blank"><button class="homeBtn" id="rewardsBtn">Leaderboard</button></a>
                    <button class="homeBtn" id='randBtn'>Rewards</button>
                </center>
            </div>
            <div style="padding-right:2.5%;padding-left:2.5%;float:right;width:45%;height:100%;">
                <login-window id="login"></login-window>
            </div>
        </div>
    </core-header-panel>
</body>

<script> 
    document.addEventListener('polymer-ready', function() {
        'use strict';
        var header = document.getElementById("header");
        var login = document.getElementById("login");
        
        var colors = ["#c0d53f","#f59331","#912d8d"];
        var colorOpp = ["white","white","white"];//["#711515","#184877","#ff0"];
        var colorIndex = Math.floor(Math.random()*3);
        
        header.style.backgroundColor = colors[colorIndex];
        header.style.color = colorOpp[colorIndex];
        login.setBackgroundColor(colors[colorIndex], colorOpp[colorIndex]);  
        attachColor2BG(colors, colorOpp, ['challengesBtn', 'rewardsBtn', 'randBtn']);
    });
    
    function attachColor2BG(colors,colorsop,eleArray){
        for(var i=0; i<eleArray.length; i+=1){
            (function(){
                var ele = document.getElementById(eleArray[i]);
                var color = colors[i];
                var colorop = colorsop[i];
                
                ele.addEventListener("mouseover", function(){
                    ele.style.backgroundColor = color;
                    ele.style.color = colorop;
                });
                
                ele.addEventListener("mouseout", function(){
                    ele.style.backgroundColor = "#e0e0df";
                    ele.style.color = "black";
                });
            })();
        }
    }
</script>

</html>