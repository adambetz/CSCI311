<?php
session_start();
	require("dbinfo.inc");
	require("front.php");
$form_fname;
$form_lname;
$form_username;
$form_pass;
$form_email;
$status;
$myerr;

function has_presence($value) {
	$trimmed_value = trim($value);
	if(!isset($trimmed_value))
		return false;
	if($trimmed_value === "")
		return false;
	return true;
}
function has_length($value, $options=[]) {
	if(isset($options['max']) && (strlen($value) > (int)$options['max'])) {
		return false;
	}
	if(isset($options['min']) && (strlen($value) < (int)$options['min'])) {
		return false;
	}
	if(isset($options['exact']) && (strlen($value) != (int)$options['exact'])) {
		return false;
	}
	return true;
}
function generate_salt($length){
		//generate pseudo random string (good enough)
		//returns 32 characters
		$unique_random_string = md5(uniqid(mt_rand(), true));
		
		//convert it to base 64 (valid chars are [a-zA-Z0-0./] )
		$base64_string = base64_encode($unique_random_string);
		
		//remove the '+' characters, just replace with '.'
		$modified_base64_string = str_replace('+', '.', $base64_string);
		
		//truncate off just what we need
		$salt = substr($modified_base64_string, 0, $length);
		
		return $salt;
	}
function password_encrypt($password){
		$hash_format = "$2y$10$";
		$salt_length = 22;
		$salt = generate_salt($salt_length);
		$format_and_salt = $hash_format.$salt;
		$hash = crypt($password, $format_and_salt);
		return $hash;
	}	
	
function createAccount($fname,$lname,$gmail,$user, $pass){
	 global $servername, $database, $username, $password;
		$myHandle;
try{
			$myHandle = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
		}catch(PDOException $e){
			$err .="Connection failed: " . $e->getMessage(). "\n";
		}
		if($myHandle){
			
			$stmt = $myHandle->prepare("SELECT count(*) as total FROM members WHERE username=:u_name");
			$stmt->bindParam(':u_name', $user);
			$stmt->execute();
			$count = $stmt->fetchColumn();
		if($count == 0){
				$hashed_pass = password_encrypt($pass);			
				$sql = "INSERT into members (fname,lname,email,username, password) VALUES('$fname','$lname','$email','$user', '$hashed_pass')";
				
				if($myHandle->exec($sql) !== false){
				  return true;
				}
				
			}else{
				echo "count is $count";
				return false;
			}
		}else{
			echo "handle bad";
			return false;
		}
		return false;
	}
if(isset($_POST['submit'])){
		$form_fname = $_POST['fname'];
	    $form_lname = $_POST['lname'];
		$form_email = $_POST['email'];
		$form_username = $_POST['user'];
		$form_password = $_POST['pass'];
		
		//validate 
		/*if(!has_presence($form_username) || !has_presence($form_password)){
			$myerr = "Sorry, username and password cannot be empty  <br/>";
		}
		if (!filter_var($form_email, FILTER_VALIDATE_EMAIL)) {
  			$myerr = " Invalid email format <br/>"; 
		}

		if(!isset($myerr) && !has_length($form_username, ['min'=>4, 'max' =>30])){
		$myerr = "Sorry, name must be between 4 and 30 characters long  <br/>";
		}else if(!isset($myerr) && !has_length($form_password, ['min'=>6])){
			$myerr = "Sorry, password must be at least 6 characters long  <br/>";
		}*/
		
		//create account
		if(!isset($myerr) && createAccount($form_fname,$form_lname,$form_username, $form_password, $form_email)){
			$status = 1;
			$_SESSION['UserData']['Username'] = $form_username;
			//header("location:login.php");
			exit;
		}else{
			$status = 0;
		}
		
	}
			
?>

<main role="main" class="inner cover">
<div class="login_topbar">
			<p class="para1">Coming for the first time?<br>Sign Up!</p>

			<form method="post" action="register.php">

				<h1 class="cover-heading">SIGN UP</h1>
				<input type="text" id="fname" placeholder="First Name"  required="required"/>
				<input type="text" id="lname" placeholder="Last Name"  required="required"/><br><br>
				<input type="email" id="email" placeholder="Email Address"  required="required"/><br><br>
 				<input type="text" id="user" placeholder="Username"  required="required"/><br><br>
				<input type="password" id="pass" placeholder="Password"  required="required"/><br><br>
				<p>By clicking signup, you agree to our <a href= "">Terms and Conditions.</a> </p>
				<input class="button" type="submit" name="submit" value="register"/>
			</form>
<?php 
	//if register fails, show an error
	if(isset($myerr)){
		echo "error: ".$myerr."</br>";
	}else if($status === 0){
		//echo "<p>Sorry, that name is already taken</p>";
	} 
?>
    </div>
	
<?php

	require("back.php");
?>
