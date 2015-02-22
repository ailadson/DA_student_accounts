function Reward(config) {
    this.name = config.challengetask.replace("Rewards: ", "");
    this.about = config.description;
    this.xp = parseInt(config.xp);
    this.id = '';
}

Reward.prototype.createContent = function(totalxp){
    var element = document.createElement('rewards-panel');
    
    element.name = this.name;
    element.about = this.about;
    element.cost = this.xp;
    element.max = Math.abs(this.xp);
    element.totalxp = totalxp;
    
    return element;
};