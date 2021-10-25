<?php

session_start();

$lastname = "";
$firstname = "";
$middlename = "" ;
$username = "";
$email = "";
$password = "";
$accesslevel = "FACULTY";
$errors = []; //array for errors in login and faculty account
$sserrorcount = 0; // scanned student error counter for dean-qrscanner
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
	$semester=$_POST['semester'];
	$startyear=$_POST['startyear'];
	$endyear=$_POST['endyear'];
	$sqlSelect = "SELECT * FROM student";
    $result = mysqli_query($db, $sqlSelect);
	$fileName = $_FILES["file"]["tmp_name"];
	$status = 'ACTIVE';
	$accesslevel = "STUDENT";
	if ($_FILES["file"]["size"] > 0) {
		$file = fopen($fileName, "r");
		$find_header=1;
		while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
			$find_header++;
			if( $find_header > 2 ) {
				$insertStudent = "INSERT into student (student_id, lastname, firstname, middlename, username, email, password, course, year, section)
					   values ('" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[3] . "','" . $column[1] . "'
					   			,'" . $column[4] . "','" . $column[7] . "','" . $column[8] . "','" . $column[9] . "')";
				$insertCourses = "INSERT into courses_enrolled (student_id, subject1, section1, subject2, section2, subject3, section3, subject4, section4,
								subject5, section5, subject6, section6, subject7, section7, subject8, section8, subject9, section9, subject10, section10, semester,
								academic_year_start, academic_year_end)
						values ('" . $column[3] . "','" . strtoupper($column[10]) . "','" . $column[11] . "','" . strtoupper($column[13]) . "','" . $column[14] . "','" . strtoupper($column[16]) . "','" . $column[17] . "'
								,'" . strtoupper($column[19]) . "','" . $column[20] . "','" . strtoupper($column[22]) . "','" . $column[23] . "','" . strtoupper($column[25]) . "','" . $column[26] . "'
								,'" . strtoupper($column[28]) . "','" . $column[29] . "','" . strtoupper($column[31]) . "','" . $column[32] . "','" . strtoupper($column[34]) . "','" . $column[35] . "'
								,'" . strtoupper($column[37]) . "','" . $column[38] . "','" . $semester . "','" . $startyear . "','" . $endyear . "')";
				$addStudentAcc = "INSERT INTO user (lastname,firstname,middlename,username,email,password,accesslevel,status)
					   values ('" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[3] . "','" . $column[1] . "','" . $column[4] . "','" . $accesslevel . "','" . $status . "')";
				$result = mysqli_query($db, $insertStudent);
				mysqli_query($db, $addStudentAcc);
				mysqli_query($db, $insertCourses);
				if (!empty($result)) {
					$type = "success";
					$message = "CSV Data Imported into the Database";
					header("location: dean-student-info.php");
				} else {
					$type = "error";
					$message = "Problem in Importing CSV Data";
				}
			}
		}
	}
}
if (isset($_POST['subjects'])) {
	header("location: printdata.html");
}

if (isset($_POST['selectStud'])) {
	$student_id = mysqli_real_escape_string($db,$_POST['student_id']);
	$scannedqr = mysqli_real_escape_string($db,$_POST['scannedqr']);
	$ssval = mysqli_real_escape_string($db,$_POST['selectStud']);
	if((!(empty($student_id))) and (!(empty($scannedqr)))){
		if($ssval == 'Select Student'){
			echo '<script>alert("Please do not input data in Manual Selector if you want to scan QR Code!");window.location.href="dean-qrscanner.php";</script>';
		}
		else{
			echo '<script>alert("Please do not input data in Manual Selector if you want to scan QR Code!");window.location.href="dean-qrscannerAS.php";</script>';
		}	
	}
	else{
		$student_id = $student_id . $scannedqr;
	}
	$subject=$_POST['subject'];
	$section=$_POST['section'];
	$timein=$_POST['time-in'];
	$timeout=$_POST['time-out'];
	$sqlSelect = "SELECT * FROM student";
    $result = mysqli_query($db, $sqlSelect);
	$soutcome = 'Student ' . $student_id . ' was not enrolled in this subject.';
	$sectionSelector = '';
	if (mysqli_num_rows($result) > 0) {
		if (empty($student_id)) {
			if($ssval == 'Select Student'){
				echo '<script>alert("Please Enter/Scan Student ID!");window.location.href="dean-qrscanner.php";</script>';
			}
			else{
				echo '<script>alert("Please Enter/Scan Student ID!");window.location.href="dean-qrscannerAS.php";</script>';
			}	
		}
		else{
			while ($row = mysqli_fetch_array($result)) {
				if($row['student_id']==$student_id){
					if (($section == 'Please Select') or ($subject == 'Please Select')) {
						if($ssval == 'Select Student'){
							echo '<script>alert("Please Select Section/ Subject!");window.location.href="dean-qrscanner.php";</script>';
						}
						else{
							echo '<script>alert("Please Select Section/ Subject!");window.location.href="dean-qrscannerAS.php";</script>';
						}	
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
						for($i = 1; $i<=10; $i++){
							$courseSelector = "SELECT * FROM courses_enrolled WHERE student_id = '$student_id'";
							mysqli_query($db, $courseSelector);
							$subjectcounter = 'subject'.strval($i);
							$subjectSelector = "SELECT $subjectcounter FROM courses_enrolled WHERE student_id = '$student_id'";
							$subjectSelector = mysqli_query($db,$subjectSelector);
							$subjectSelector = mysqli_fetch_assoc($subjectSelector);
							$subjectSelector = reset($subjectSelector);

							if(strval($subject) == strval($subjectSelector)){
								$soutcome = 'Student ' . $student_id . ' was enrolled in this subject.';
								$sectioncounter = 'section'.strval($i);
								$sectionSelector = "SELECT $sectioncounter FROM courses_enrolled WHERE student_id = '$student_id'";
								$sectionSelector = mysqli_query($db,$sectionSelector);
								$sectionSelector = mysqli_fetch_assoc($sectionSelector);
								$sectionSelector = reset($sectionSelector);
								if($sectionSelector == 'Same as my Current Section'){
									$sectionSelector = $course . $year . '-' . $ssection;
								}
								$_SESSION['sectionSelector'] = $sectionSelector;
							}
						}
						$_SESSION['sectionoutcome'] = $outcome;
						$_SESSION['subjectoutcome'] = $soutcome;
						if(($timein == 'Please Select') or ($timeout == 'Please Select')){
							if($ssval == 'Select Student'){
								echo '<script>alert("Please Select Time-In/ Time-Out!");window.location.href="dean-qrscanner.php";</script>';
							}
							else{
								echo '<script>alert("Please Select Time-In/ Time-Out!");window.location.href="dean-qrscannerAS.php";</script>';
							}	
						}
						else{
							$StudAttendTime = gmdate("H:i", time() + 3600*(7+date("I"))); //time - in ni student
							$SATHour = substr($StudAttendTime, -5,2); // return yung hour *00*:00 ng time-in ni student
							$SATMins = substr($StudAttendTime, -2,2); // return yung minutes 00:*00* ng time-in ni student
							$SATHourMins = $SATHour . $SATMins; // pagsamahin yung hour at mins
							$SATHM_int = intval($SATHourMins); // convert into string yung hour at mins para sa condition

							$FACtimein = $_POST['time-in']; //time - in na sinelect ni faculty
							$FACHour = substr($FACtimein, -5,2); // return yung hour *00*:00 ng time-in na sinelect ni faculty
							$FACMins = substr($FACtimein, -2,2); // return yung minutes 00:*00* ng time-in na sinelect ni faculty
							$FACHourMins = $FACHour . $FACMins; // pagsamahin yung hour at mins
							$FACHM_int = intval($FACHourMins); // convert into string yung hour at mins para sa condition

							$_SESSION['classTimeIn'] = $FACtimein;
							$_SESSION['classTimeOut'] = $timeout;
							if($SATHM_int > ($FACHM_int + 15)){
								if($SATHM_int <($FACHM_int + 30)){
									$timeRemarks = 'LATE';
									$_SESSION['timeRemarks'] = $timeRemarks;
									if($section == $sectionSelector){
										if($_SESSION['subjectoutcome'] == 'Student '.$_SESSION['sstudent_id'].' was enrolled in this subject.'){
											// GET SEMESTER
											$sem = "SELECT semester FROM courses_enrolled WHERE student_id = '$student_id'";
											$sem = mysqli_query($db,$sem);
											$sem = mysqli_fetch_assoc($sem);
											$sem = reset($sem);
											// GET academic year start
											$ays = "SELECT academic_year_start FROM courses_enrolled WHERE student_id = '$student_id'";
											$ays = mysqli_query($db,$ays);
											$ays = mysqli_fetch_assoc($ays);
											$ays = reset($ays);
											// GET academic year end
											$aye = "SELECT academic_year_end FROM courses_enrolled WHERE student_id = '$student_id'";
											$aye = mysqli_query($db,$aye);
											$aye = mysqli_fetch_assoc($aye);
											$aye = reset($aye);
											$DateofAttendance = gmdate("Y/m/j");
											$addAttendance = "INSERT INTO student_attendance (student_id,firstname,lastname,subject,section,stud_time_in,remarks,semester,
															academic_year_start,academic_year_end,date_of_schedule)
												values ('" . $student_id . "','" . $firstname. "','" . $lastname . "','" . $subject . "','" . $section . "',
															'" . $StudAttendTime . "','" . $timeRemarks . "','" . $sem . "','" . $ays . "'
															,'" . $aye . "','" . $DateofAttendance . "')";
											mysqli_query($db, $addAttendance);
											header("location: dean-scannedqr.php");
											exit();
										}
									}
									else{
										if($ssval == 'Select Student'){
											echo '<script>alert("Student did not matched with selected section/subject.\nPlease Select/Scan another student.");window.location.href="dean-qrscanner.php";</script>';
										}
										else{
											echo '<script>alert("Student did not matched with selected section/subject.\nPlease Select/Scan another student.");window.location.href="dean-qrscannerAS.php";</script>';
										}	
									}
								}
								else{
									$timeRemarks = 'ABSENT';
									$_SESSION['timeRemarks'] = $timeRemarks;
									if($section == $sectionSelector){
										if($_SESSION['subjectoutcome'] == 'Student '.$_SESSION['sstudent_id'].' was enrolled in this subject.'){
											// GET SEMESTER
											$sem = "SELECT semester FROM courses_enrolled WHERE student_id = '$student_id'";
											$sem = mysqli_query($db,$sem);
											$sem = mysqli_fetch_assoc($sem);
											$sem = reset($sem);
											// GET academic year start
											$ays = "SELECT academic_year_start FROM courses_enrolled WHERE student_id = '$student_id'";
											$ays = mysqli_query($db,$ays);
											$ays = mysqli_fetch_assoc($ays);
											$ays = reset($ays);
											// GET academic year end
											$aye = "SELECT academic_year_end FROM courses_enrolled WHERE student_id = '$student_id'";
											$aye = mysqli_query($db,$aye);
											$aye = mysqli_fetch_assoc($aye);
											$aye = reset($aye);
											$DateofAttendance = gmdate("Y/m/j");
											$addAttendance = "INSERT INTO student_attendance (student_id,firstname,lastname,subject,section,stud_time_in,remarks,semester,
															academic_year_start,academic_year_end,date_of_schedule)
												values ('" . $student_id . "','" . $firstname. "','" . $lastname . "','" . $subject . "','" . $section . "',
															'" . $StudAttendTime . "','" . $timeRemarks . "','" . $sem . "','" . $ays . "'
															,'" . $aye . "','" . $DateofAttendance . "')";
											mysqli_query($db, $addAttendance);
											header("location: dean-scannedqr.php");
											exit();
										}
									}
									else{
										if($ssval == 'Select Student'){
											echo '<script>alert("Student did not matched with selected section/subject.\nPlease Select/Scan another student.");window.location.href="dean-qrscanner.php";</script>';
										}
										else{
											echo '<script>alert("Student did not matched with selected section/subject.\nPlease Select/Scan another student.");window.location.href="dean-qrscannerAS.php";</script>';
										}	
									}
								}
							}
							else{
								$timeRemarks = 'ON-TIME';
								$_SESSION['timeRemarks'] = $timeRemarks;
								if($section == $sectionSelector){
									if($_SESSION['subjectoutcome'] == 'Student '.$_SESSION['sstudent_id'].' was enrolled in this subject.'){
										// GET SEMESTER
										$sem = "SELECT semester FROM courses_enrolled WHERE student_id = '$student_id'";
										$sem = mysqli_query($db,$sem);
										$sem = mysqli_fetch_assoc($sem);
										$sem = reset($sem);
										// GET academic year start
										$ays = "SELECT academic_year_start FROM courses_enrolled WHERE student_id = '$student_id'";
										$ays = mysqli_query($db,$ays);
										$ays = mysqli_fetch_assoc($ays);
										$ays = reset($ays);
										// GET academic year end
										$aye = "SELECT academic_year_end FROM courses_enrolled WHERE student_id = '$student_id'";
										$aye = mysqli_query($db,$aye);
										$aye = mysqli_fetch_assoc($aye);
										$aye = reset($aye);
										$DateofAttendance = gmdate("Y/m/j");
										$addAttendance = "INSERT INTO student_attendance (student_id,firstname,lastname,subject,section,stud_time_in,remarks,semester,
															academic_year_start,academic_year_end,date_of_schedule)
												values ('" . $student_id . "','" . $firstname. "','" . $lastname . "','" . $subject . "','" . $section . "',
															'" . $StudAttendTime . "','" . $timeRemarks . "','" . $sem . "','" . $ays . "'
															,'" . $aye . "','" . $DateofAttendance . "')";
										mysqli_query($db, $addAttendance);
										header("location: dean-scannedqr.php");
										exit();
									}
								}
								else{
									if($ssval == 'Select Student'){
										echo '<script>alert("Student did not matched with selected section/subject.\nPlease Select/Scan another student.");window.location.href="dean-qrscanner.php";</script>';
									}
									else{
										echo '<script>alert("Student did not matched with selected section/subject.\nPlease Select/Scan another student.");window.location.href="dean-qrscannerAS.php";</script>';
									}	
								}
							}
						}
					}
				}
			}
			if (($section == 'Please Select') or ($subject == 'Please Select')) {
				if($ssval == 'Select Student'){
					echo '<script>alert("Please Select Section/ Subject!");window.location.href="dean-qrscanner.php";</script>';
				}
				else{
					echo '<script>alert("Please Select Section/ Subject!");window.location.href="dean-qrscannerAS.php";</script>';
				}	
			}
			elseif(($timein == 'Please Select') or ($timeout == 'Please Select')){
				if($ssval == 'Select Student'){
					echo '<script>alert("Please select Time-in and Time-Out!");window.location.href="dean-qrscanner.php";</script>';
				}
				else{
					echo '<script>alert("Please select Time-in and Time-Out!");window.location.href="dean-qrscannerAS.php";</script>';
				}	
			}
			else{
				if($ssval == 'Select Student'){
					echo '<script>alert("Student id is not existing.\nPlease Select/Scan another student.");window.location.href="dean-qrscanner.php";</script>';
				}
				else{
					echo '<script>alert("Student id is not existing.\nPlease Select/Scan another student.");window.location.href="dean-qrscannerAS.php";</script>';
				}	
			}
		}
	}
}

if (isset($_POST["SelectAnotherStudent"])){
	$currentSubject = $_SESSION['selectedsubject'];
	$_SESSION['currentSubject'] = $currentSubject; // passed variable for selected subject

	$currentSection = $_SESSION['selectedsection'];
	$_SESSION['currentSection'] = $currentSection; // passed variable for selected section

    $currentTimein = $_SESSION['classTimeIn'];
	$_SESSION['currentTimein'] = $currentTimein; // passed variable for selected time in

    $currentTimeout = $_SESSION['classTimeOut'];
	$_SESSION['currentTimeout'] = $currentTimeout; // passed variable for selected time out
	header("location: dean-qrscannerAS.php");
}

if (isset($_POST["StudentViewer"])){
   $student_id_viewer = $_POST["StudentViewer"];
	//display lastname depends on student_id
	$lastquery = "SELECT lastname FROM student WHERE student_id = '$student_id_viewer'";
	$lquery = mysqli_query($db,$lastquery);
	$lastnamequery = mysqli_fetch_assoc($lquery);
	$lastname = reset($lastnamequery);
	   
	//display firstname depends on student_id
	$firstquery = "SELECT firstname FROM student WHERE student_id = '$student_id_viewer'";
	$fquery = mysqli_query($db,$firstquery);
	$firstnamequery = mysqli_fetch_assoc($fquery);
	$firstname = reset($firstnamequery);
	   
	//display middlename depends on student_id
	$midquery = "SELECT middlename FROM student WHERE student_id = '$student_id_viewer'";
	$mquery = mysqli_query($db,$midquery);
	$middlenamequery = mysqli_fetch_assoc($mquery);
	$middlename = reset($middlenamequery);
	   
	//display course depends on student_id
	$course = "SELECT course FROM student WHERE student_id = '$student_id_viewer'";
	$course = mysqli_query($db,$course);
	$course = mysqli_fetch_assoc($course);
	$course = reset($course);
	   
	//display year depends on student_id
	$year = "SELECT year FROM student WHERE student_id = '$student_id_viewer'";
	$year = mysqli_query($db,$year);
	$year = mysqli_fetch_assoc($year);
	$year = reset($year);
	   
	//display section depends on student_id
	$ssection = "SELECT section FROM student WHERE student_id = '$student_id_viewer'";
	$ssection = mysqli_query($db,$ssection);
	$ssection = mysqli_fetch_assoc($ssection);
	$ssection = reset($ssection);

	//display all subjects and section
	$all = "SELECT * FROM courses_enrolled WHERE student_id = '$student_id_viewer'";
	$all = mysqli_query($db,$all);
	$all = mysqli_fetch_assoc($all);
	$_SESSION['subject1'] = $all['subject1'];
	$_SESSION['subject2'] = $all['subject2'];
	$_SESSION['subject3'] = $all['subject3'];
	$_SESSION['subject4'] = $all['subject4'];
	$_SESSION['subject5'] = $all['subject5'];
	$_SESSION['subject6'] = $all['subject6'];
	$_SESSION['subject7'] = $all['subject7'];
	$_SESSION['subject8'] = $all['subject8'];
	$_SESSION['subject9'] = $all['subject9'];
	$_SESSION['subject10'] = $all['subject10'];
	
	$_SESSION['section1'] = $all['section1'];
	if($all['section1'] == 'Same as my Current Section'){
		$_SESSION['section1'] = $course . $year . '-' . $ssection;
	}
	$_SESSION['section2'] = $all['section2'];
	if($all['section2'] == 'Same as my Current Section'){
		$_SESSION['section2'] = $course . $year . '-' . $ssection;
	}
	$_SESSION['section3'] = $all['section3'];
	if($all['section3'] == 'Same as my Current Section'){
		$_SESSION['section3'] = $course . $year . '-' . $ssection;
	}
	$_SESSION['section4'] = $all['section4'];
	if($all['section4'] == 'Same as my Current Section'){
		$_SESSION['section4'] = $course . $year . '-' . $ssection;
	}
	$_SESSION['section5'] = $all['section5'];
	if($all['section5'] == 'Same as my Current Section'){
		$_SESSION['section5'] = $course . $year . '-' . $ssection;
	}
	$_SESSION['section6'] = $all['section6'];
	if($all['section6'] == 'Same as my Current Section'){
		$_SESSION['section6'] = $course . $year . '-' . $ssection;
	}
	$_SESSION['section7'] = $all['section7'];
	if($all['section7'] == 'Same as my Current Section'){
		$_SESSION['section7'] = $course . $year . '-' . $ssection;
	}
	$_SESSION['section8'] = $all['section8'];
	if($all['section8'] == 'Same as my Current Section'){
		$_SESSION['section8'] = $course . $year . '-' . $ssection;
	}
	$_SESSION['section9'] = $all['section9'];
	if($all['section9'] == 'Same as my Current Section'){
		$_SESSION['section9'] = $course . $year . '-' . $ssection;
	}
	$_SESSION['section10'] = $all['section10'];
	if($all['section10'] == 'Same as my Current Section'){
		$_SESSION['section10'] = $course . $year . '-' . $ssection;
	}

	$_SESSION['sstudent_id'] = $student_id_viewer ;
	$_SESSION['slastname'] = $lastname ;
    $_SESSION['sfirstname'] = $firstname ;
	$_SESSION['smiddlename'] = $middlename ;
    $_SESSION['scourse'] = $course ;
	$_SESSION['syear'] = $year ;
	$_SESSION['ssection'] = $ssection ;
	
	header("location: view-student-info.php");
}

if (isset($_POST["EndClass"])){
	$endSubject = $_SESSION['selectedsubject'];
	$endSection = $_SESSION['selectedsection'];
    $endTimein = $_SESSION['classTimeIn'];
    $endTimeout = $_SESSION['classTimeOut'];
	$Date = gmdate("Y/m/j");
	$studentTimein = 'null';
	$rremarks = 'ABSENT';
	$studselect = "SELECT * FROM courses_enrolled";
    $studselectresult = mysqli_query($db, $studselect);
	if (mysqli_num_rows($studselectresult) > 0) {
		while ($row1 = mysqli_fetch_array($studselectresult)) {
			$checker = 0;
			$row1student_id = $row1['student_id']; // student id ni row 1
			$attenselect = "SELECT * FROM student_attendance WHERE ((subject = '" . $endSubject . "' and section = '" . $endSection . "') and date_of_schedule = '" . $Date . "');";
			$attenselectresult = mysqli_query($db, $attenselect);
			$row2student_id = '';
			while ($row2 = mysqli_fetch_array($attenselectresult)) {
				$row2student_id = $row2['student_id']; // student id ni row 2
				$rsem = $row2['semester'];
				$rays = $row2['academic_year_start'];
				$raye = $row2['academic_year_end'];
				if($row1student_id == $row2student_id){ //means naka attendance si student
					$checker = 1;
					break;
				}
			}
			if($checker == 0){
				// means si student e wala sa attendance
				for($count = 1; $count <= 10; $count++){
					// iisa isahin bawat section/subject sa row 1 para icheck kung si student ay
					// enrolled sa subject at section pero di umattend sa klase.
					$subcounter = 'subject' . $count;
					$subselector = $row1[$subcounter]; // kukunin bawat subject sa row 1
					$seccounter = 'section' . $count;
					$secselector = $row1[$seccounter]; // kukunin bawat section sa row 1
							
					if($subselector == $endSubject){
						//pag pumasok dito means nagmatch subject ni student sa subject ni prof
						//display first name depends on student_id
						$rfirstname = "SELECT firstname FROM student WHERE student_id = '" . $row1student_id . "';";
						$rfirstname = mysqli_query($db,$rfirstname);
						$rfirstname = mysqli_fetch_assoc($rfirstname);
						$rfirstname = reset($rfirstname);

						//display last name depends on student_id
						$rlastname = "SELECT lastname FROM student WHERE student_id = '" . $row1student_id . "';";
						$rlastname = mysqli_query($db,$rlastname);
						$rlastname = mysqli_fetch_assoc($rlastname);
						$rlastname = reset($rlastname);
						if($secselector == 'Same as my Current Section'){
							//perform muna natin dito kukunin yung real section nya
							//display course depends on student_id
							$rcourse = "SELECT course FROM student WHERE student_id = '" . $row1student_id . "';";
							$rcourse = mysqli_query($db,$rcourse);
							$rcourse = mysqli_fetch_assoc($rcourse);
							$rcourse = reset($rcourse);
										
							//display year depends on student_id
							$ryear = "SELECT year FROM student WHERE student_id = '" . $row1student_id . "';";
							$ryear = mysqli_query($db,$ryear);
							$ryear = mysqli_fetch_assoc($ryear);
							$ryear = reset($ryear);
										
							//display section depends on student_id
							$rsection = "SELECT section FROM student WHERE student_id = '" . $row1student_id . "';";
							$rsection = mysqli_query($db,$rsection);
							$rsection = mysqli_fetch_assoc($rsection);
							$rsection = reset($rsection);

							// eto na yung real section nya
							$secselector = $rcourse . $ryear . '-' . $rsection;

							if($secselector == $endSection){
								//pag pumasok dito means matched yung subject and section pero di sya umattend

								//append na natin sya sa attendance table
								$addAttendance = "INSERT INTO student_attendance (student_id,firstname,lastname,subject,section,stud_time_in,remarks,semester,
													academic_year_start,academic_year_end,date_of_schedule)
										values ('" . $row1student_id . "','" . $rfirstname. "','" . $rlastname . "','" . $endSubject . "','" . $endSection . "',
													'" . $studentTimein . "','" . $rremarks . "','" . $rsem . "','" . $rays . "'
													,'" . $raye . "','" . $Date . "')";
								mysqli_query($db, $addAttendance);
							}
							else{
								break;
							}
						}
						else{
							//perform parin dito yung section selector condition
							if($secselector == $endSection){
								//pag pumasok dito means matched yung subject and section pero di sya umattend

								//append na natin sya sa attendance table
								$addAttendance = "INSERT INTO student_attendance (student_id,firstname,lastname,subject,section,stud_time_in,remarks,semester,
													academic_year_start,academic_year_end,date_of_schedule)
										values ('" . $row1student_id . "','" . $rfirstname. "','" . $rlastname . "','" . $endSubject . "','" . $endSection . "',
													'" . $studentTimein . "','" . $rremarks . "','" . $rsem . "','" . $rays . "'
													,'" . $raye . "','" . $Date . "')";
								mysqli_query($db, $addAttendance);
							}
							else{
								break;
							}
						}
					}
					else{
						continue;
					}
				}
			}
		}
		header("location: dean-page.php");
	}
}
?>