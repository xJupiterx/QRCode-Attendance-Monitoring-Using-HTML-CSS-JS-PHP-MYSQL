<?php

session_start();

$lastname = "";
$firstname = "";
$middlename = "" ;
$username = "";
$email = "";
$password = "";
$accesslevel = "FACULTY";
$errors = array();

$db = mysqli_connect('localhost','root','','accounts') or die('could not connect ');


## Register Function Input -> MYSQL
if (isset($_POST['Register'])) {
	$lastname= mysqli_real_escape_string($db,$_POST['lastname']);
	$firstname = mysqli_real_escape_string($db,$_POST['firstname']);
	$middlename = mysqli_real_escape_string($db,$_POST['middlename']);
	$username = mysqli_real_escape_string($db,$_POST['username']);
	$email = mysqli_real_escape_string($db,$_POST['email']);
	$password = mysqli_real_escape_string($db,$_POST['password']);

	$password = md5($password);
	if (empty($lastname)) {array_push($errors, 'Lastname is Required');}
	if (empty($firstname)) {array_push($errors, 'Firstname is Required');}
	if (empty($middlename)) {array_push($errors, 'Middlename is Required');}
	if (empty($username)) {array_push($errors, 'Username is Required');}
	if (empty($email)) {array_push($errors, 'Email is Required');}
	if (empty($password)) {array_push($errors, 'Password is Required');}
	if (empty($accesslevel)) {array_push($errors, 'Access Level is Required');}

	$userquery = "SELECT * FROM user WHERE username = '$username' or email ='$email' LIMIT 1";
	$query = mysqli_query($db,$userquery);
	$user = mysqli_fetch_assoc($query);

	if ($user) {
		if ($user['username'] == $username) {
			array_push($errors, 'username already exist');
		}
		if ($user['email'] == $email) {
			array_push($errors, 'email already exist');
		}
	}

	if (count($errors) == 0) {

		$query = "INSERT INTO user (lastname,firstname,middlename,username,email,password,accesslevel) 
		VALUES ('$lastname','$firstname','$middlename','$username','$email','$password','$accesslevel')" ;
		mysqli_query($db,$query);
		$_SESSION['username'] = $username ;
		header("location: register.php");
	}
}


## LOGIN Function Input -> MYSQL
if (isset($_POST['Login'])) {
	$username= mysqli_real_escape_string($db,$_POST['username']); 
	$password = mysqli_real_escape_string($db,$_POST['password']);
	$spassword = md5($password);

	if (empty($username)) {array_push($errors, 'username is required');}
	if (empty($password)) {array_push($errors, 'password is required');}
	
	if (count($errors) == 0) {
		$querys = "SELECT * FROM user WHERE username = '$username' AND (password = '$password' OR password = '$spassword') " ;
		$results = mysqli_query($db,$querys);
		if (mysqli_num_rows($results)) {
			//display lastname depends on username
			$lastquery = "SELECT lastname FROM user WHERE username = '$username'";
			$lquery = mysqli_query($db,$lastquery);
			$lastnamequery = mysqli_fetch_assoc($lquery);
			$lastname = reset($lastnamequery);
			
			//display firstname depends on username
			$firstquery = "SELECT firstname FROM user WHERE username = '$username'";
			$fquery = mysqli_query($db,$firstquery);
			$firstnamequery = mysqli_fetch_assoc($fquery);
			$firstname = reset($firstnamequery);
			
			//display middlename depends on username
			$midquery = "SELECT middlename FROM user WHERE username = '$username'";
			$mquery = mysqli_query($db,$midquery);
			$middlenamequery = mysqli_fetch_assoc($mquery);
			$middlename = reset($middlenamequery);
			
			//display email depends on username
			$emquery = "SELECT email FROM user WHERE username = '$username'";
			$equery = mysqli_query($db,$emquery);
			$mailquery = mysqli_fetch_assoc($equery);
			$email = reset($mailquery);
			
			//display accesslevel depends on username
			$accequery = "SELECT accesslevel FROM user WHERE username = '$username'";
			$aquery = mysqli_query($db,$accequery);
			$levelquery = mysqli_fetch_assoc($aquery);
			$acclevel = reset($levelquery);
			
			$_SESSION['username'] = $username ;
			$_SESSION['lastname'] = $lastname ;
			$_SESSION['firstname'] = $firstname ;
			$_SESSION['middlename'] = $middlename ;
			$_SESSION['email'] = $email ;
			$_SESSION['accesslevel'] = $acclevel ;
			if($acclevel == 'FACULTY'){
				header("location: faculty-page.php");
			}
			else{
				if($acclevel == 'DEAN'){
					header("location: dean-page.php");
				}
				else{
					if($acclevel == 'STUDENT'){
						//display student id depends on username
						$s_id = "SELECT student_id FROM student WHERE username = '$username'";
						$s_id = mysqli_query($db,$s_id);
						$s_id = mysqli_fetch_assoc($s_id);
						$student_id = reset($s_id);
						
						//display course depends on username
						$course = "SELECT course FROM student WHERE username = '$username'";
						$course = mysqli_query($db,$course);
						$course = mysqli_fetch_assoc($course);
						$course = reset($course);
						
						//display year depends on username
						$year = "SELECT year FROM student WHERE username = '$username'";
						$year = mysqli_query($db,$year);
						$year = mysqli_fetch_assoc($year);
						$year = reset($year);
						
						//display section depends on username
						$section = "SELECT section FROM student WHERE username = '$username'";
						$section = mysqli_query($db,$section);
						$section = mysqli_fetch_assoc($section);
						$section = reset($section);
						
						$_SESSION['student_id'] = $student_id ;
						$_SESSION['course'] = $course ;
						$_SESSION['year'] = $year ;
						$_SESSION['section'] = $section ;
						header("location: student-page.php");
					}
				}
			}
		}
		else{
			array_push($errors, "wrong username/password");
		}
	}
}

if (isset($_POST['Delete_Records'])) {
	$userquery = "TRUNCATE TABLE student";
	$query = mysqli_query($db,$userquery);
}
?>