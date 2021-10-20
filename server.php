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
$errorcount = 0; //for $_POST selectStud (dean-qrscanner function)
$sserrorcount = 0; //for user not selecting in dropdown (dean-qrscanner function)
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

						//display subject1 and section1 depends on username
						$subject1 = "SELECT subject1 FROM student WHERE username = '$username'";
						$subject1 = mysqli_query($db,$subject1);
						$subject1 = mysqli_fetch_assoc($subject1);
						$subject1 = reset($subject1);

						$section1 = "SELECT section1 FROM student WHERE username = '$username'";
						$section1 = mysqli_query($db,$section1);
						$section1 = mysqli_fetch_assoc($section1);
						$section1 = reset($section1);

						//display subject2 and section2 depends on username
						$subject2 = "SELECT subject2 FROM student WHERE username = '$username'";
						$subject2 = mysqli_query($db,$subject2);
						$subject2 = mysqli_fetch_assoc($subject2);
						$subject2 = reset($subject2);

						$section2 = "SELECT section2 FROM student WHERE username = '$username'";
						$section2 = mysqli_query($db,$section2);
						$section2 = mysqli_fetch_assoc($section2);
						$section2 = reset($section2);

						//display subject3 and section3 depends on username
						$subject3 = "SELECT subject3 FROM student WHERE username = '$username'";
						$subject3 = mysqli_query($db,$subject3);
						$subject3 = mysqli_fetch_assoc($subject3);
						$subject3 = reset($subject3);

						$section3 = "SELECT section3 FROM student WHERE username = '$username'";
						$section3 = mysqli_query($db,$section3);
						$section3 = mysqli_fetch_assoc($section3);
						$section3 = reset($section3);

						//display subject4 and section4 depends on username
						$subject4 = "SELECT subject4 FROM student WHERE username = '$username'";
						$subject4 = mysqli_query($db,$subject4);
						$subject4 = mysqli_fetch_assoc($subject4);
						$subject4 = reset($subject4);

						$section4 = "SELECT section4 FROM student WHERE username = '$username'";
						$section4 = mysqli_query($db,$section4);
						$section4 = mysqli_fetch_assoc($section4);
						$section4= reset($section4);

						//display subject5 and section5 depends on username
						$subject5 = "SELECT subject5 FROM student WHERE username = '$username'";
						$subject5 = mysqli_query($db,$subject5);
						$subject5 = mysqli_fetch_assoc($subject5);
						$subject5 = reset($subject5);

						$section5 = "SELECT section5 FROM student WHERE username = '$username'";
						$section5 = mysqli_query($db,$section5);
						$section5 = mysqli_fetch_assoc($section5);
						$section5 = reset($section5);

						//display subject6 and section6 depends on username
						$subject6 = "SELECT subject6 FROM student WHERE username = '$username'";
						$subject6 = mysqli_query($db,$subject6);
						$subject6 = mysqli_fetch_assoc($subject6);
						$subject6 = reset($subject6);

						$section6 = "SELECT section6 FROM student WHERE username = '$username'";
						$section6 = mysqli_query($db,$section6);
						$section6 = mysqli_fetch_assoc($section6);
						$section6 = reset($section6);

						//display subject7 and section7 depends on username
						$subject7 = "SELECT subject7 FROM student WHERE username = '$username'";
						$subject7 = mysqli_query($db,$subject7);
						$subject7 = mysqli_fetch_assoc($subject7);
						$subject7 = reset($subject7);

						$section7 = "SELECT section7 FROM student WHERE username = '$username'";
						$section7 = mysqli_query($db,$section7);
						$section7 = mysqli_fetch_assoc($section7);
						$section7 = reset($section7);

						//display subject8 and section8 depends on username
						$subject8 = "SELECT subject8 FROM student WHERE username = '$username'";
						$subject8 = mysqli_query($db,$subject8);
						$subject8 = mysqli_fetch_assoc($subject8);
						$subject8 = reset($subject8);

						$section8 = "SELECT section8 FROM student WHERE username = '$username'";
						$section8 = mysqli_query($db,$section8);
						$section8 = mysqli_fetch_assoc($section8);
						$section8 = reset($section8);

						//display subject9 and section9 depends on username
						$subject9 = "SELECT subject9 FROM student WHERE username = '$username'";
						$subject9 = mysqli_query($db,$subject9);
						$subject9 = mysqli_fetch_assoc($subject9);
						$subject9 = reset($subject9);

						$section9 = "SELECT section9 FROM student WHERE username = '$username'";
						$section9 = mysqli_query($db,$section9);
						$section9 = mysqli_fetch_assoc($section9);
						$section9 = reset($section9);

						//display subject10 and section10 depends on username
						$subject10 = "SELECT subject10 FROM student WHERE username = '$username'";
						$subject10 = mysqli_query($db,$subject10);
						$subject10 = mysqli_fetch_assoc($subject10);
						$subject10 = reset($subject10);

						$section10 = "SELECT section10 FROM student WHERE username = '$username'";
						$section10 = mysqli_query($db,$section10);
						$section10 = mysqli_fetch_assoc($section10);
						$section10 = reset($section10);
						
						$_SESSION['student_id'] = $student_id ;
						$_SESSION['course'] = $course ;
						$_SESSION['year'] = $year ;
						$_SESSION['section'] = $section ;
						$_SESSION['subject1'] = $subject1 ;
						$_SESSION['section1'] = $section1 ;
						$_SESSION['subject2'] = $subject2 ;
						$_SESSION['section2'] = $section2 ;
						$_SESSION['subject3'] = $subject3 ;
						$_SESSION['section3'] = $section3 ;
						$_SESSION['subject4'] = $subject4 ;
						$_SESSION['section4'] = $section4 ;
						$_SESSION['subject5'] = $subject5 ;
						$_SESSION['section5'] = $section5 ;
						$_SESSION['subject6'] = $subject6 ;
						$_SESSION['section6'] = $section6 ;
						$_SESSION['subject7'] = $subject7 ;
						$_SESSION['section7'] = $section7 ;
						$_SESSION['subject8'] = $subject8 ;
						$_SESSION['section8'] = $section8 ;
						$_SESSION['subject9'] = $subject9 ;
						$_SESSION['section9'] = $section9 ;
						$_SESSION['subject10'] = $subject10 ;
						$_SESSION['section10'] = $section10 ;
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

if (isset($_POST["import"])) {
	$sqlSelect = "SELECT * FROM student";
    $result = mysqli_query($db, $sqlSelect);
	$fileName = $_FILES["file"]["tmp_name"];
	$accesslevel = "STUDENT";
	if ($_FILES["file"]["size"] > 0) {
		$file = fopen($fileName, "r");
		$find_header=1;
		while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
			$find_header++;
			if( $find_header > 2 ) {
				$sqlInsert = "INSERT into student (student_id, lastname, firstname, middlename, username, email, password, course, year, section,
								subject1, section1, subject2, section2, subject3, section3, subject4, section4, subject5, section5,
								subject6, section6, subject7, section7, subject8, section8, subject9, section9, subject10, section10)
					   values ('" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[3] . "','" . $column[1] . "','" . $column[4] . "','" . $column[7] . "','" . $column[8] . "','" . $column[9] . "'
					   			,'" . $column[10] . "','" . $column[11] . "','" . $column[13] . "','" . $column[14] . "','" . $column[16] . "','" . $column[17] . "'
								,'" . $column[19] . "','" . $column[20] . "','" . $column[22] . "','" . $column[23] . "','" . $column[25] . "','" . $column[26] . "'
								,'" . $column[28] . "','" . $column[29] . "','" . $column[31] . "','" . $column[32] . "','" . $column[34] . "','" . $column[35] . "'
								,'" . $column[37] . "','" . $column[38] . "')";
				$addStudentAcc = "INSERT INTO user (lastname,firstname,middlename,username,email,password,accesslevel)
					   values ('" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[3] . "','" . $column[1] . "','" . $column[4] . "','$accesslevel')";
				$result = mysqli_query($db, $sqlInsert);
				mysqli_query($db, $addStudentAcc);
				if (!empty($result)) {
					$type = "success";
					$message = "CSV Data Imported into the Database";
				} else {
					$type = "error";
					$message = "Problem in Importing CSV Data";
				}
			}
		}
	}
}
if (isset($_POST['subjects'])) {
	header("location: printdata.php");
}

if (isset($_POST['selectStud'])) {
	$student_id= mysqli_real_escape_string($db,$_POST['student_id']);
	$subject=$_POST['subject'];
	$section=$_POST['section'];
	$sqlSelect = "SELECT * FROM student";
    $result = mysqli_query($db, $sqlSelect);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result)) {
			if($row['student_id']==$student_id){
				if (($section == 'Please Select') or ($subject == 'Please Select')) {
					$sserrors = 'Please Select Section/ Subject!';
					$sserrorcount = 1;
				}
				else{
					//display lastname depends on student_id
					$lastquery = "SELECT lastname FROM student WHERE student_id = '$student_id'";
					$lquery = mysqli_query($db,$lastquery);
					$lastnamequery = mysqli_fetch_assoc($lquery);
					$lastname = reset($lastnamequery);
					
					//display firstname depends on student_id
					$firstquery = "SELECT firstname FROM student WHERE student_id = '$student_id'";
					$fquery = mysqli_query($db,$firstquery);
					$firstnamequery = mysqli_fetch_assoc($fquery);
					$firstname = reset($firstnamequery);
					
					//display middlename depends on student_id
					$midquery = "SELECT middlename FROM student WHERE student_id = '$student_id'";
					$mquery = mysqli_query($db,$midquery);
					$middlenamequery = mysqli_fetch_assoc($mquery);
					$middlename = reset($middlenamequery);
					
					//display course depends on student_id
					$course = "SELECT course FROM student WHERE student_id = '$student_id'";
					$course = mysqli_query($db,$course);
					$course = mysqli_fetch_assoc($course);
					$course = reset($course);
					
					//display year depends on student_id
					$year = "SELECT year FROM student WHERE student_id = '$student_id'";
					$year = mysqli_query($db,$year);
					$year = mysqli_fetch_assoc($year);
					$year = reset($year);
					
					//display section depends on student_id
					$ssection = "SELECT section FROM student WHERE student_id = '$student_id'";
					$ssection = mysqli_query($db,$ssection);
					$ssection = mysqli_fetch_assoc($ssection);
					$ssection = reset($ssection);

					$_SESSION['sstudent_id'] = $student_id ;
					$_SESSION['slastname'] = $lastname ;
					$_SESSION['sfirstname'] = $firstname ;
					$_SESSION['smiddlename'] = $middlename ;
					$_SESSION['selectedsubject'] = $subject ;
					$_SESSION['selectedsection'] = $section ;
					$_SESSION['scourse'] = $course ;
					$_SESSION['syear'] = $year ;
					$_SESSION['ssection'] = $ssection ;
					if($section == ($course.$year.'-'.$ssection)){
						$outcome = 'Student '.$student_id.' matched with selected section.';
					}
					else{
						$outcome = 'Student '.$student_id." didn't matched with selected section.";
					}
					$sqlSelect = "SELECT * FROM student";
					$result = mysqli_query($db, $sqlSelect);
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_array($result)) {
							if($row['student_id']==$student_id){
								for($i = 1; $i<=10;$i++){
									$subjectcounter = 'subject'.strval($i);
									if($row[$subjectcounter]==$subject){
										$soutcome = 'Student '.$student_id.' was enrolled in this subject.';
									}
								}
								$soutcome = 'Student '.$student_id.' was not enrolled in this subject.';
							}
						}
					}
					$_SESSION['sectionoutcome'] = $outcome;
					$_SESSION['subjectoutcome'] = $soutcome;
					header("location: dean-scannedqr.php");
				}
			}
		}
		if (empty($student_id)) {
			$errors = 'Please Enter Student ID!';
			$errorcount = 1;
		}
		else{
			$errors = "Student ID Didn't Match!";
			$errorcount = 1;
		}
	}
}
?>