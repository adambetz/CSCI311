var player;
function Initialize () {
	player = new Player(STAT_LEVEL.NORMAL, STAT_LEVEL.NORMAL, STAT_LEVEL.NORMAL,
			STAT_LEVEL.NORMAL, STAT_LEVEL.NORMAL, STAT_LEVEL.NORMAL, STAT_LEVEL.NORMAL);
	InitStats();
}

function InitStats(){
	document.getElementById("stat_mood").innerHTML = player.mood;
	document.getElementById("stat_energy").innerHTML = player.energy;
	document.getElementById("stat_grade").innerHTML = player.grade;
	document.getElementById("stat_suspect").innerHTML = player.suspectLevel;
	document.getElementById("stat_hunger").innerHTML = player.hunger;
	document.getElementById("stat_caffeine").innerHTML = player.caffeine;
	document.getElementById("stat_nerd").innerHTML = player.nerd;
}

const STAT_LEVEL = {
	CRITICAL: 'critically-low',
	LOW: 'low',
	NORMAL: 'normal',
	HIGH: 'high',
	DANGER: 'dangerously-high'
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
	hunger(){
		return hunger;
	}
}

function SelectAction(action){
	switch(action) {
  	case "SLEEP":
    	sleep();
    	break;
  	case "STUDY":
    	study();
    	break;
    case "GYM":
    	gym();
    	break;
  	case "CHAT":
    	chat();
    	break;
    case "COFFEE":
    	coffee();
    	break;
  	case "FLIRT":
    	flirt();
   		break;
    case "EAT":
    	eat();
    	break;
  	case "HOMEWORK":
    	homework();
    	break;
    case "HACK":
    	hack();
    	break;
 	default:
    	alert("error in switch statement for SelectAction()");
	}
}

function IncreaseStat(){

}

function DecreaseStat(){

}

function Sleep(){

}
function Study(){

}
function gym(){

}
function chat(){

}
function coffee(){

}
function flirt(){

}
function eat(){

}
function homework(){

}
function hack(){

}