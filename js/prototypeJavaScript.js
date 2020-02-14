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
	hunger(){
		return hunger;
	}
}

function SelectAction(action){
	
	alert("You are in a " +action +" state...\nPress okay to jump ahead in time");
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
//TODO change to handle percentages
function increaseStat(stat){
	switch(stat){
		case STAT_LEVEL.DEAD:
			return STAT_LEVEL.DEAD;
			break;
		case STAT_LEVEL.CRITICAL:
			return STAT_LEVEL.BAD;
			break;
		case STAT_LEVEL.BAD:
			return STAT_LEVEL.NORMAL;
			break;
		case STAT_LEVEL.NORMAL:
			return STAT_LEVEL.GOOD;
			break; 
		case STAT_LEVEL.GOOD: 
			return STAT_LEVEL.EXCELLENT;
			break;
		case STAT_LEVEL.EXCELLENT: 
			return STAT_LEVEL.EXCELLENT;
		break;

		default:
			console.log("ERROR: increase stats switch-statement fell through");
	}
}
function decreaseStat(stat, multiplier){
	switch(stat){
		case STAT_LEVEL.DEAD:
			return STAT_LEVEL.DEAD;
			break;
		case STAT_LEVEL.CRITICAL:
			return STAT_LEVEL.DEAD;
			break;
		case STAT_LEVEL.BAD:
			return STAT_LEVEL.CRITICAL;
			break;
		case STAT_LEVEL.NORMAL:
			return STAT_LEVEL.BAD;
			break; 
		case STAT_LEVEL.GOOD: 
			return STAT_LEVEL.NORMAL;
			break;
		case STAT_LEVEL.EXCELLENT: 
			return STAT_LEVEL.GOOD;
		break;

		default:
			console.log("ERROR: increase stats switch-statement fell through");
	}
}

//missing class decreases grade
function sleep(){
	player.energy = increaseStat(player.energy);
	player.caffeine = increaseStat(player.caffeine);

	if(player.suspectLevel == STAT_LEVEL.BAD || player.STAT_LEVEL == STAT_LEVEL.CRITICAL){
		player.suspectLevel = increaseStat(player.suspectLevel);
	}

	player.hunger = decreaseStat(player.hunger);
	InitStats();
}
function study(){
	player.nerd = increaseStat(player.nerd);
	
	player.mood = decreaseStat(player.mood);
	player.energy = decreaseStat(player.energy);
	InitStats();
}
function gym(){
	player.mood = increaseStat(player.mood);
	
	player.energy = decreaseStat(player.energy);
	player.hunger = decreaseStat(player.hunger);
	InitStats();
}
function chat(){
	player.mood = increaseStat(player.mood);
	InitStats();
}
function coffee(){
	player.energy = increaseStat(player.energy);

	player.caffeine = decreaseStat(player.caffeine);
	InitStats();
}
function flirt(){
	player.mood = increaseStat(player.mood);

	player.nerd = decreaseStat(player.nerd);
	InitStats();
}
function eat(){
	player.hunger = increaseStat(player.hunger);
	InitStats();
}
function homework(){
	player.grade = increaseStat(player.grade);
	player.nerd = increaseStat(player.nerd);
	
	player.mood = decreaseStat(player.mood);
	player.energy = decreaseStat(player.energy);
	InitStats();
}
function hack(){
	player.grade = increaseStat(player.grade);

	player.suspectLevel = decreaseStat(player.suspectLevel);
	InitStats();
}