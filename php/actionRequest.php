<?php 
	session_start();
	require_once("../private/dbinfo.inc");

	// must be logged in to view page
	if(!isset($_SESSION['UserData']['Username'])){
		print_r("not logged in");
		header("location:../index.php");
	  	exit;
	}

	$userid = $_SESSION['UserData']['Username'];
	$handle;

	try{
		$handle = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

	}catch(PDOException $e){
		$err .= "Connection failed: " . $e->getMessage() . "\n";
	}	
		
	class PLAYER{
		static $CurrentAction = 'NONE';
		static $currentRoom = "Template.php";

		static $MOOD;
		static $ENERGY;
		static $GRADE;
		static $SUSPECTLEVEL;
		static $HUNGER;
		static $CAFFEINE;
		static $NERD;
	}

	class ROOMS{
		static $CLASSROOM = 'Classroom';
		static $GYM = 'Gym';
		static $LAB = 'Lab';
		static $PUB = 'Pub';
		static $RESIDENCY = 'Residency';
		static $TEMPLATE = 'Template';
	}
	

	function completeAction(){
        switch ($_SESSION['UserData']['CurrentAction']) {
        	case 'SLEEP':
        		player_sleep();
        		break;
        	case 'STUDY':
        		player_study();
        		break;
        	case 'GYM':
        		player_gym();
        		break;
        	case 'CHAT':
        		player_chat();
        		break;
        	case 'COFFEE':
        		player_coffee();
        		break;
        	case 'FLIRT':
        		player_flirt();
        		break;
        	case 'EAT':
        		player_eat();
        		break;
        	case 'HOMEWORK':
        		player_homework();
        		break;
        	case 'HACK':
        		player_hack();
        		break;
        	default:
        		PLAYER::$CurrentAction = 'NONE';
        		return 0;
        		break;
	}
		$handle = $GLOBALS['handle'];
		$stmt = $handle->prepare("UPDATE stats SET 'userMood' = :1, 'energy' = :2, 'grade' = :3, 'suspicion' = :4, 'hunger' = :5, 'caffeine' = :6, 'nerdStatus' = :7  WHERE id = (SELECT id from members where username = \"$GLOBALS[userid]\")");
		$stmt->bindParam(':1', PLAYER::$MOOD);	
		$stmt->bindParam(':2', PLAYER::$ENERGY);	
		$stmt->bindParam(':3', PLAYER::$GRADE);	
		$stmt->bindParam(':4', PLAYER::$SUSPECTLEVEL);	
		$stmt->bindParam(':5', PLAYER::$HUNGER);	
		$stmt->bindParam(':6', PLAYER::$CAFFEINE);	
		$stmt->bindParam(':7', PLAYER::$NERD);	
		$stmt->execute();
		$_SESSION['UserData']['CurrentAction'] = 'NONE';
		return PLAYER::$MOOD;		
	}
	

	function processAction($action){
		$_SESSION['UserData']['CurrentAction'] = $action;
		return $_SESSION['UserData']['CurrentAction'];		
	}


    function retrieveStats(){
    	if($GLOBALS['handle']){
    		$handle = $GLOBALS['handle'];
			//$userid = $_SESSION['UserData']['Username'];
			//$stmt = $handle->prepare("SELECT * FROM stats WHERE id = (SELECT id from members where username = \":uid\")");
			//$stmt->bindParam(':uid', $userid);	
			$stmt = $handle->prepare("SELECT * FROM stats WHERE id = (SELECT id from members where username = \"$GLOBALS[userid]\")");
			$stmt->execute();
			$rslt = $stmt->fetch();
			PLAYER::$MOOD = $rslt["userMood"];
			PLAYER::$ENERGY = $rslt["energy"];
			PLAYER::$GRADE = $rslt["grade"];
			PLAYER::$SUSPECTLEVEL = $rslt["suspicion"];
			PLAYER::$HUNGER = $rslt["hunger"];
			PLAYER::$CAFFEINE = $rslt["caffeine"];
			PLAYER::$NERD = $rslt["nerdStatus"];
		}
    	$stats = array(PLAYER::$MOOD, PLAYER::$ENERGY, PLAYER::$GRADE, PLAYER::$SUSPECTLEVEL, PLAYER::$HUNGER, PLAYER::$CAFFEINE, PLAYER::$NERD);
    	return $stats;
    }

    function getRoom(){
    	return PLAYER::$currentRoom;
    }
    function setRoom($room){
    	PLAYER::$currentRoom = $room;
    	return PLAYER::$currentRoom;
    }


    if (isset($_POST['requestAction'])) {
        echo processAction($_POST['requestAction']);
    } else if (isset($_POST['requestStats'])) {
        echo json_encode(retrieveStats());
    } else if (isset($_POST['getRoom'])) {
        echo getRoom();
    } else if (isset($_POST['setRoom'])) {
        echo setRoom($_POST['setRoom']);
    } else if (isset($_POST['completeAction'])){
	retrieveStats();
        echo completeAction();
    }


    function player_sleep(){	
    	player::$ENERGY = 100;
    	player::$MOOD += 50;
    	player::$SUSPECTLEVEL = 0;
    	player::$HUNGER +=  50;
    	player::$CAFFEINE = 0;
    	return 6;
	}
	function player_study(){
		player::$MOOD -= 25;
		player::$NERD += 20;
		return 3;
	}
	function player_gym(){
		player::$MOOD += 20;
		player::$ENERGY -= 10;
		return 3;
	}
	function player_chat(){
		player::$MOOD += 20;
		return 1;
	}
	function player_coffee(){
		player::$CAFFEINE += 25;
		player::$ENERGY += 10;
		return .5;
	}
	function player_flirt(){
		player::$MOOD += 20;
		return .5;
	}
	function player_eat(){
		player::$HUNGER -= 50;
		return 1;
	}
	function player_homework(){
		//homework is done
		player::$GRADE += 10;
		player::$MOOD -= 50;
		return 2;
	}
	function player_hack(){
		player::$SUSPECTLEVEL += 25;
		player::$GRADE += 10;
		return 2;
	}

	function increaseStat($stat, $amount){
		$stat = $stat + $amount;
		if ($stat > 100) $stat = 100;
		return $stat;
	}
	function decreaseStat($stat, $amount){
		$stat = $stat - $amount;
		if ($stat < 0) $stat = 0;
		return $stat;
	}
	

?>
