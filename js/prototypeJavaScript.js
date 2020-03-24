var currentRoom = "";
var player;

function Initialize () {
	player = new Player();
	
	InitStats();
	GetRoom();
}

function InitStats(){
	//var stats = ['MOOD', 'ENERGY', 'GRADE', 'SUSPECTLEVEL', 'HUNGER', 'CAFFEINE', 'NERD'];
	//stats.forEach(initStat);
	var stats;
	$.ajax({
            url:"../php/actionRequest.php", //the page containing php script
            type: "post", //request type,
           	data: "requestStats",
            success: function(result){
             stats = JSON.parse(result);
             player.UpdateStats(stats[0],stats[1],stats[2],stats[3],stats[4],stats[5],stats[6]);
             document.getElementById("stat_mood").innerHTML = player.mood;
			 document.getElementById("stat_energy").innerHTML = player.energy;
			 document.getElementById("stat_grade").innerHTML = player.grade;
			 document.getElementById("stat_suspect").innerHTML = player.suspectLevel;
			 document.getElementById("stat_hunger").innerHTML = player.hunger;
			 document.getElementById("stat_caffeine").innerHTML = player.caffeine;
			 document.getElementById("stat_nerd").innerHTML = player.nerd;
           }
    });
}


function GetRoom(){
$.ajax({
            url:"../php/actionRequest.php", //the page containing php script
            type: "post", //request type,
           	data: "getRoom",
            success: function(result){
            currentRoom = "";
             currentRoom = currentRoom + result;
           }
         });
}
function SetRoom(room){
	$.ajax({
            url:"../php/actionRequest.php", //the page containing php script
            type: "post", //request type,
           	data: {"setRoom" : room},
            success: function(result){

             currentRoom = result;
             alert(currentRoom);
           }
         });
}

const STAT_LEVEL = {
	DEAD: 'You ded',
	CRITICAL: 'Very Bad!',
	BAD: 'Kinda Bad',
	NORMAL: 'Normal',
	GOOD: 'Good',
	EXCELLENT: 'Excellent'
}
const STATS = {
	MOOD: 'mood',
	ENERGY: 'energy',
	GRADE: 'grade',
	SUSPECTLEVEL: 'suspectLevel',
	HUNGER: 'hunger',
	CAFFEINE: 'caffeine',
	NERD: 'nerd'
}
const ACTIONS = {
	SLEEP: 'sleep',
	STUDY: 'study',
	GYM: 'go to the gym',
	CHAT: 'chat',
	COFFEE: 'grab a coffee',
	FLIRT: 'flirt',
	EAT: 'grab a bite to eat',
	HOMEWORK: 'do homwork',
	HACK: 'hack a computer'
}

class p{
	constructor(thing){
		this.thing = STAT_LEVEL.CRITICAL;
	}
}

class Player {
	constructor(mood, energy, grade, suspectLevel, hunger, caffeine, nerd){
		this.mood = mood;
		this.energy = energy;
		this.grade = grade;
		this.suspectLevel = suspectLevel;
		this.hunger = hunger;
		this.caffeine = caffeine;
		this.nerd = nerd;
	} 
	UpdateStats(mood, energy, grade, suspectLevel, hunger, caffeine, nerd){
		this.mood = mood;
		this.energy = energy;
		this.grade = grade;
		this.suspectLevel = suspectLevel;
		this.hunger = hunger;
		this.caffeine = caffeine;
		this.nerd = nerd;
	}
}

function CancelAction(action){
	/*$.ajax("game_actions.php").done(function(data){
        $(".rooms_actionsbar").html(data);

    }).fail(function(){
    });

    InitStats(); */
   // $(".rooms_actionsbar").load("game_actions.php");
    location.reload();
}

function CompleteAction(action){
	//alert(room);
	$.ajax("game_actions.php").done(function(data){
        $(".rooms_actionsbar").html(data);

    }).fail(function(){
    });

    InitStats();
}

function SelectAction(action){


 	$.ajax({
            url:"../php/actionRequest.php", //the page containing php script
            type: "post", //request type,
           	data: {"requestAction" : action},
            success: function(result){


           }
         });


 	//load inAction.php
 	$.ajax("game_actionbar_inAction.php").done(function(data){
        $(".rooms_actionsbar").html(data);
        
        $("#currentActionHeading").text("Current Action: " +action);
        $(".update_btn").attr('id', action);

    }).fail(function(){
        alert("fail");
    });
	
}
