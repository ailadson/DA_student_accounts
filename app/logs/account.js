function Account(content){
    this.content = content;
    
    this.snippets = {
        challenges : document.getElementById("challenges"),
        surveys:  document.getElementById("surveys"),
        rewards : document.getElementById("rewards")
    }
    
    this.mainContent = {
        home : document.getElementById("home-mainContent"),
        challenges : document.getElementById("challenges-mainContent"),
        rewards : document.getElementById("rewards-mainContent"),
        surveys : document.getElementById("surveys-mainContent"),
    }
    
    this.challengeDict = {};
    this.challengeDict["challenges-ccol"] = "City of Chicago Learning Challenge";
    this.challengeDict["challenges-dajoinccol"] = "Join City of Chicago Learning";
    this.challengeDict["challenges-dajoinfusestudio"] = "Join Fuse Studio";
    this.challengeDict["challenges-dajoinwebmaker.org"] = "Join webmaker.org";
    this.challengeDict["challenges-dawelcometotheda"] = "Welcome to the Digital Atelier";
    this.challengeDict["challenges-daworkshop"] = "Digital Atelier Workshop";
    this.challengeDict["dastudentgroupadvisor"] = "Student Group Advisor";
    this.challengeDict["dastudentgroupassistant"] = "Student Group Assistant";
    
    //survey
    this.surveyInfo = content.surveyInfo;
    this.surveyIndex = 0;
    
    this.init();
}

Account.prototype.init = function(){
    this.getSnippets();
    this.mainContent.surveys.eatData({info: this.surveyInfo, index: 0});
    this.mainContent.home.setupHome(this.content);
    this.mainContent.home.classList.toggle('hidden');
    this.mainContent.home.classList.toggle('shown');
}

Account.prototype.getCurrentSurvey = function(){
    return this.surveyInfo[this.surveyIndex];
}

Account.prototype.formatData = function(snip){
    switch(snip.data){
        case 'xp' :
            snip.data = ("Total XP: " + this.content.totalxp);
    }
};

Account.prototype.getSnippets = function(){
    var xhr = new XMLHttpRequest();
    var self = this;
    xhr.open("GET","data/snippets.json",true);
    xhr.onload = function() {
        var data = JSON.parse(xhr.responseText)["snippets"];
        
        for(var i=0; i < data.length; i+=1){
            self.getSnippet(data[i]);
        }
    }
    xhr.send();
}

Account.prototype.getSnippet = function(snipData){
    var name = snipData.title.toLowerCase();
    var self=this;
    var mainContent = this["mainContent"][name];
    var element = this["snippets"][name];
    this.formatData(snipData);
    element.eatData(snipData);

    switch(mainContent.id){
        case 'challenges-mainContent':
            mainContent.packData(this.challengeDict, this.content.challenges, this.content.challengeInfo);
            break;
        case 'rewards-mainContent':
           // mainContent.packData(this.content.totalxp, this.content.challengeInfo);
            break;
    }
        
    element.handleClick = function(){
        for(content in self.mainContent){
            self.mainContent[content].classList.remove("shown");
        }

        mainContent.classList.toggle("shown");
    };
    
};