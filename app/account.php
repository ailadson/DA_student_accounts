<!DOCTYPE html>
<html>

<head>
    <?php require('html/headMarkup.html'); ?>
    <link type="text/css" rel=stylesheet href="css/account.css">
    <link rel="import" href="components/core-drawer-panel/core-drawer-panel.html">
    <link rel="import" href="components/core-header-panel/core-header-panel.html">
</head>

<body unresolved>
    <core-drawer-panel>
        <core-header-panel drawer id="drawer">
            <core-toolbar id="toolbar_drawer">
                <img src="imgs/logo.png" id="logo">
            </core-toolbar>
            <div> Drawer content... </div>
        </core-header-panel>
        
        <core-header-panel main id="main">
            <core-toolbar id="toolbar_main">
                <span>Digital Atelier Dashboard</span>
            </core-toolbar>
            <div> Main content... </div>
        </core-header-panel>
    </core-drawer-panel>
</body>
</html>