<?php require('access.php')?>    
<!doctype html>

<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes">

    <title>Admin Console</title>

    <?php require('html/headMarkup.html'); ?>
    <link type="text/css" rel="stylesheet" href="css/admin.css">

    <link href="components/core-collapse/core-collapse.html" rel="import">
    <link href="components/core-menu/core-menu.html" rel="import">
    <link href="components/paper-dropdown/paper-dropdown.html" rel="import">
    <link href="components/paper-item/paper-item.html" rel="import">

    <link href="components/paper-dropdown-menu/paper-dropdown-menu.html" rel="import">
    <link href="components/admin-content/admin-content.html" rel="import">

</head>
<body>
    <div id="header">Digital Atelier Admin Dashboard</div>
    <template is="auto-binding">
            <paper-dropdown-menu label="Navigate To" id="menu">
                <paper-dropdown class="dropdown">
                    <core-menu class="menu">
                        <template repeat="{{section in sections}}">
                            <paper-item id="{{section.id}}">{{section.title}}</paper-item>
                        </template>
                    </core-menu>
                </paper-dropdown>
            </paper-dropdown-menu>
        <template repeat="{{section in sections}}">
            <admin-content type="{{section.id}}" name="{{section.title}}" subTitles="{{section.subTitles}}" iframe="{{section.iframe}}"></admin-content>
        </template>
    </template>
</body>
<script src="script/admin.js" type="text/javascript"></script>
<script>
var admin = new Admin();
    
window.addEventListener('polymer-ready', function(e) {    
    admin.init("menu");
});
    
function hideAllAdminContent(){
    var eles = document.getElementsByTagName("admin-content");
    
    for(var i=0;i<eles.length; i+=1){
        eles[i].style.display = "none";
    }
}
</script>
</html>

