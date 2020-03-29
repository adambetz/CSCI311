<?php
	session_start();
	require("private/dbinfo.inc");
	require("front.php");

$form_name;
$form_pass;
$status;
$err;

function has_presence($value) {
	$trimmed_value = trim($value);
	if(!isset($trimmed_value))
		return false;
	if($trimmed_value === "")
		return false;
	return true;
}
//compares a password attempt to the existing hashed password
function password_check($pass, $existing_hash){
	 global $log;
	 $hash = crypt($pass, $existing_hash);
//         $log .= "in check: hashed $hash, ";
	if($hash === $existing_hash){
		return true;
	}else{
		return false;
	}
}



function attempt_login($user, $pass){

	 global $servername, $database, $username, $password;
	 global $log;
	 $myHandle;
	try{
			$myHandle = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
			//echo "Success. Connected to database";
		}catch(PDOException $e){
			$err .="Connection failed: " . $e->getMessage(). "\n";
			//echo "connection failed";
		}

		if($myHandle){

		$myStmt = "SELECT username, password FROM members WHERE username='$user'";
		$rslt = $myHandle->query($myStmt);
		$log = $myStmt;
		if(count($rslt) > 0){
			foreach($rslt as $row){
				$hashed_pass = $row['pass'];
			}

			if(password_check($passwordAttempt, $hashed_pass)){
				return true;
			}else{
			//	$log .="attempt: $passwordAttempt, hash: $hashed_pass, password didn't match";
				return false;
			}
		}else{
	//		$log .= "user name did not match";
			return false;
		}
	}
	return false;

}

	if(isset($_SESSION['UserData']['Username'])){
 	$status=2;
}
if(isset($_POST['submit'])){
   $form_name=$_POST['user'];
   $form_pass=$_POST['pass'];
   //validate data

 //attempt login with submitted data
   if(!isset($err) && attempt_login($form_name, $form_pass)){
   		$status = 1;
//		$_SESSION['UserData']['Username'] = $form_name;
		header("location:game/template.php");
		//	exit;
   }else{
		$status = 0;
		$err .= "Sorry, login failed, please try again.";
	}
}


?>

<main role="main" class="inner cover">
<div class="login_topbar">
<h1 class="cover-heading">LOG IN</h1>
<?php
	if(isset($err)){
		echo $err."<br/>";
	}
?>


			<form method="post" action="login.php">

				<label for="user">Username</label><br>
				<input type="text" id="user" name="user" required="required"/><br>
				<label for="pass">Password</label><br>
				<input type="password" id="pass" name="pass" required="required"/><br><br>
				<input class="button" type="submit" name="submit" value="login"/>

			</form>
<?php
	//check status, and either show logged in, or show register link
	if($status === 1 || $status ===2){
	//	echo "you're totally logged in: ".$_SESSION['UserData']['Username'].
			"<br/>";
	}else{
		echo "Don't have an account? Create one: ";
		echo "<a href=\"register.php\">Register</a>";
	}
?>
		</div>

<?php
	require("back.php");
?>
