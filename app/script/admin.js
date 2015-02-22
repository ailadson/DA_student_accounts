/*jshint strict: true*/
function Admin(){
    this.scope = document.querySelector('template[is=auto-binding]');
    
    this.scope.sections = [
        {
            title : 'Review Survey Data',
            id : 'dataSurvey',
            subTitles : ['Main Page','Qualitative','Quantitative'],
            iframe : "https://docs.google.com/forms/d/1dZGnmN2wPYtZm62VZn9M5Vb7McjZ52-znxE3bSVuI2M/viewform?embedded=true#start=publishanalytics"
        }
    ];
}

Admin.prototype.init = function(ele) {
    setTimeout(function(){
        hideAllAdminContent();
        
        document.getElementById(ele).addEventListener("core-select",function(e){
            hideAllAdminContent();
            var id = e.detail.item.id;
            var ele = document.getElementById(id+'Content');
            ele.style.display = "inline";
        });
    }, 1000);
}

Admin.prototype.getData = function (type,name,cb){
    "use strict";
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "data.php?type="+type+"&name="+name, true);
    xhr.onload = function (){
        var data = JSON.parse(xhr.responseText);
        cb(data);
    };
    xhr.send();
};

Admin.prototype.getProfiles = function (cb){
    "use strict";
    this.getData('profile',"all",cb);
};

Admin.prototype.getProfile = function (name,cb){
    "use strict";
    this.getData('profile',name,cb);
};

Admin.prototype.getSurvey = function (name,cb){
    "use strict";
    this.getData('survey',name,cb);
};

//Admin.prototype.showContent = function(container,data,type){
//    "use strict";
//    var contentData = data.d;
//    var metaData = data.m;
//    var content = "";
//    
//    switch(container.id){
//            case "surveyContent" :
//                content = this.getSurveyContent(contentData, metaData, type);
//                break;
//    }
//    
//    
//};