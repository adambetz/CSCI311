<?php 
	session_start();
	require_once("dbinfo.inc");

	// must be logged in to view page
	if(!isset($_SESSION['UserData']['Username'])){
	   header("location:../login.php");
	   exit;
	}

	$handle;
	try{
		$handle = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

	}catch(PDOException $e){
		$err .= "Connection failed: " . $e->getMessage() . "\n";
	}	
		

	}
	class PLAYER{
		static $CurrentAction = 'NONE';
		static $currentRoom = "Template.php";

		static $MOOD = 50;
		static $ENERGY = 20;
		static $GRADE = 30;
		static $SUSPECTLEVEL = 40;
		static $HUNGER = 50;
		static $CAFFEINE = 60;
		static $NERD = 70;
	}

	class ROOMS{
		static $CLASSROOM = 'Classroom';
		static $GYM = 'Gym';
		static $LAB = 'Lab';
		static $PUB = 'Pub';
		static $RESIDENCY = 'Residency';
		static $TEMPLATE = 'Template';
	}
	

	function processAction($data){
		//get the user stats
		if($handle){
			$stmt = $handle->prepare("SELECT * FROM stats WHERE id = (SELECT id from members where username = ?)");
			$stmt->bind_param("s", $userid);
			$userid = $_SESSION['UserData']['Username'];

			$rslt = $myHandle->query($stmt);
		}
        switch ($data) {
        	case 'SLEEP':
        		return player_sleep();
        		break;
        	case 'STUDY':
        		return player_study();
        		break;
        	case 'GYM':
        		return player_gym();
        		break;
        	case 'CHAT':
        		return player_chat();
        		break;
        	case 'COFFEE':
        		return player_coffee();
        		break;
        	case 'FLIRT':
        		return player_flirt();
        		break;
        	case 'EAT':
        		return player_eat();
        		break;
        	case 'HOMEWORK':
        		return player_homework();
        		break;
        	case 'HACK':
        		return player_hack();
        		break;
        	default:
        		PLAYER::$CurrentAction = 'NONE';
        		return 0;
        		break;
        }
    }


    function retrieveStats(){
    	if($handle){
			$stmt = $handle->prepare("SELECT * FROM stats WHERE id = (SELECT id from members where username = ?)");
			$stmt->bind_param("s", $userid);
			$userid = $_SESSION['UserData']['Username'];

			$rslt = $myHandle->query($stmt);
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
        echo json_encode(getRoom());
    } else if (isset($_POST['setRoom'])) {
        echo json_encode(setRoom($_POST['setRoom']));
    }


    function player_sleep(){	
    	player::$ENERGY = 100;
    	player::$MOOD += 50;
    	player::$SUSPECTLEVEL = 0;
    	player::$HUNGER += 50;
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