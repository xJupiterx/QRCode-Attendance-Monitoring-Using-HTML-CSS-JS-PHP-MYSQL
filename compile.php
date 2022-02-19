<?php
	include 'server.php';
    $sqlchecker = "SELECT * FROM compiled_attendance;";
    $checkerquery = mysqli_query($db,$sqlchecker);
    if (mysqli_num_rows($checkerquery) > 0) {
        $deleter = "TRUNCATE compiled_attendance;";
        mysqli_query($db,$deleter);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">
	<link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/scs.png" type="image/x-icon">
</head>

<body>
    <div id="app">
        <?php include('sidebar/dean_sidebar.html'); ?>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <?php 
                                    $file = 'assets/images/avatar/' . $_SESSION['username'] . '.jpg';
                                    if(file_exists($file)): ?>
                                        <img src="assets/images/avatar/<?php echo $_SESSION['username']; ?>.jpg" alt="" srcset="">
                                    <?php endif ?>
                                    <?php 
                                    if(!(file_exists($file))):  ?>
                                        <img src="assets/images/avatar/default.png" height="80">
                                    <?php endif ?>
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, <?php echo $_SESSION['lastname']; ?>, <?php echo $_SESSION['firstname']; ?>!</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="change-password.php"><i data-feather="settings"></i> Change Password</a>
                                <div class="dropdown-divider"></div>
                                <form class = 'row' style = 'height:22px' method ='post'>
                                    <input class = "col-md-6" type="submit" name="logout" value="LOGOUT" style = 'border:none; background-color:white; position:relative; left:34px; height:18px'>
                                    <p class="col-md-6" style = 'width:5px; position:relative; right:92px; bottom:2px'><i data-feather="log-out"></i></p>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid">
				<section class="col-md-12">
                    <br>
                    <center><div class="card" style = " width:100%">
                        <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #3acf61; height:50px">
                            <div class = 'row'>
                                <div class = 'col-md-6'>
                                    <h4 class="card-title" style="color: white;width: 140px; position:relative; top:7px"><strong>Student List</strong></h4>
                                </div>
                                <div class = 'col-md-6' style = 'position:relative; left: 950px; top:7px'>
                                    <p><a href='download-compilation.php'>Download</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-0">
                            <div class="table-responsive">
                                <?php
                                    $sqlSelect = "SELECT * FROM courses_enrolled;";
                                    $result = mysqli_query($db, $sqlSelect);
                                                
                                    if (mysqli_num_rows($result) > 0) {
                                ?>
                                <div class="form-group position-relative has-icon-left">
                                </div>
                                <form class="col-md-auto" method='post' style='overflow:scroll; width:100%; height: 500px'>
                                    <table id="myTable" class="table table-bordered table-sm" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th style = "width:8%; font-size: 14px">Student_ID</th>
                                                <th style = "width:8%; font-size: 14px">subject1</th>
                                                <th style = "width:32%; font-size: 14px">O1_L1_A1</th>
                                                <th style = "width:8%; font-size: 14px">subject2</th>
                                                <th style = "width:32%; font-size: 14px">O2_L2_A2</th>
                                                <th style = "width:8%; font-size: 14px">subject3</th>
                                                <th style = "width:32%; font-size: 14px">O3_L3_A3</th>
                                                <th style = "width:8%; font-size: 14px">subject4</th>
                                                <th style = "width:32%; font-size: 14px">O4_L4_A4</th>
                                                <th style = "width:8%; font-size: 14px">subject5</th>
                                                <th style = "width:32%; font-size: 14px">O5_L5_A5</th>
                                                <th style = "width:8%; font-size: 14px">subject6</th>
                                                <th style = "width:32%; font-size: 14px">O6_L6_A6</th>
                                                <th style = "width:8%; font-size: 14px">subject7</th>
                                                <th style = "width:32%; font-size: 14px">O7_L7_A7</th>
                                                <th style = "width:8%; font-size: 14px">subject8</th>
                                                <th style = "width:32%; font-size: 14px">O8_L8_A8</th>
                                                <th style = "width:8%; font-size: 14px">subject9</th>
                                                <th style = "width:32%; font-size: 14px">O19_L9_A9</th>
                                                <th style = "width:8%; font-size: 14px">subject10</th>
                                                <th style = "width:32%; font-size: 14px">O10_L10_A10</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                while ($row = mysqli_fetch_array($result)) { 
                                                    $st_id = $row['student_id'];
                                                    $s1 = $row['subject1'];
                                                    $s2 = $row['subject2'];
                                                    $s3 = $row['subject3'];
                                                    $s4 = $row['subject4'];
                                                    $s5 = $row['subject5'];
                                                    $s6 = $row['subject6'];
                                                    $s7 = $row['subject7'];
                                                    $s8 = $row['subject8'];
                                                    $s9 = $row['subject9'];
                                                    $s10 = $row['subject10'];

                                                    //display lastname depends on student_id
                                                    $lastquery = "SELECT lastname FROM user WHERE username = '$st_id'";
                                                    $lquery = mysqli_query($db,$lastquery);
                                                    $lastnamequery = mysqli_fetch_assoc($lquery);
                                                    $lastname = reset($lastnamequery);
                                                    
                                                    //display firstname depends on student_id
                                                    $firstquery = "SELECT firstname FROM user WHERE username = '$st_id'";
                                                    $fquery = mysqli_query($db,$firstquery);
                                                    $firstnamequery = mysqli_fetch_assoc($fquery);
                                                    $firstname = reset($firstnamequery);
                                                    
                                                    //display middlename depends on student_id
                                                    $midquery = "SELECT middlename FROM user WHERE username = '$st_id'";
                                                    $mquery = mysqli_query($db,$midquery);
                                                    $middlenamequery = mysqli_fetch_assoc($mquery);
                                                    $middlename = reset($middlenamequery);

                                                    //display course depends on student_id
                                                    $course = "SELECT course FROM student WHERE username = '$st_id'";
                                                    $course = mysqli_query($db,$course);
                                                    $course = mysqli_fetch_assoc($course);
                                                    $course = reset($course);
                                                    
                                                    //display year depends on student_id
                                                    $year = "SELECT year FROM student WHERE username = '$st_id'";
                                                    $year = mysqli_query($db,$year);
                                                    $year = mysqli_fetch_assoc($year);
                                                    $year = reset($year);
                                                    
                                                    //display section depends on student_id
                                                    $section = "SELECT section FROM student WHERE username = '$st_id'";
                                                    $section = mysqli_query($db,$section);
                                                    $section = mysqli_fetch_assoc($section);
                                                    $section = reset($section);

                                                    //combine course year section
                                                    $cys = $course . $year . '-' . $section;

                                                    //display semester
                                                    $sem = "SELECT semester FROM courses_enrolled WHERE student_id = '$st_id'";
                                                    $sem = mysqli_query($db,$sem);
                                                    $sem = mysqli_fetch_assoc($sem);
                                                    $sem = reset($sem);

                                                    //display acad year start
                                                    $ays = "SELECT academic_year_start FROM courses_enrolled WHERE student_id = '$st_id'";
                                                    $ays = mysqli_query($db,$ays);
                                                    $ays = mysqli_fetch_assoc($ays);
                                                    $ays = reset($ays);

                                                    //display acad year end
                                                    $aye = "SELECT academic_year_end FROM courses_enrolled WHERE student_id = '$st_id'";
                                                    $aye = mysqli_query($db,$aye);
                                                    $aye = mysqli_fetch_assoc($aye);
                                                    $aye = reset($aye);


                                                    //variables for counting total
                                                    $o1c = 0;
                                                    $l1c = 0;
                                                    $a1c = 0;
                                                    
                                                    $o2c = 0;
                                                    $l2c = 0;
                                                    $a2c = 0;
                                                    
                                                    $o3c = 0;
                                                    $l3c = 0;
                                                    $a3c = 0;
                                                    
                                                    $o4c = 0;
                                                    $l4c = 0;
                                                    $a4c = 0;
                                                    
                                                    $o5c = 0;
                                                    $l5c = 0;
                                                    $a5c = 0;
                                                    
                                                    $o6c = 0;
                                                    $l6c = 0;
                                                    $a6c = 0;
                                                    
                                                    $o7c = 0;
                                                    $l7c = 0;
                                                    $a7c = 0;
                                                    
                                                    $o8c = 0;
                                                    $l8c = 0;
                                                    $a8c = 0;
                                                    
                                                    $o9c = 0;
                                                    $l9c = 0;
                                                    $a9c = 0;
                                                    
                                                    $o10c = 0;
                                                    $l10c = 0;
                                                    $a10c = 0;
                                                    //Compiling attendance based on subject 1
                                                    $sql1 = "SELECT * FROM student_attendance WHERE student_id = '$st_id' AND subject = '$s1';";
                                                    $result1 = mysqli_query($db, $sql1);
                                                    if (mysqli_num_rows($result1) > 0) {
                                                        while ($row1 = mysqli_fetch_array($result1)) { 
                                                            if($row1['remarks'] == 'ON-TIME'){
                                                                $o1c = $o1c + 1;
                                                            }
                                                            if($row1['remarks'] == 'LATE'){
                                                                $l1c = $l1c + 1;
                                                            }
                                                            if($row1['remarks'] == 'ABSENT'){
                                                                $a1c = $a1c + 1;
                                                            }
                                                        }
                                                    }
                                                    $final1 = $o1c . '_' . $l1c . '_' . $a1c;
                                                    //Compiling attendance based on subject 2
                                                    $sql2 = "SELECT * FROM student_attendance WHERE student_id = '$st_id' AND subject = '$s2';";
                                                    $result2 = mysqli_query($db, $sql2);
                                                    if (mysqli_num_rows($result2) > 0) {
                                                        while ($row2 = mysqli_fetch_array($result2)) { 
                                                            if($row2['remarks'] == 'ON-TIME'){
                                                                $o2c = $o2c + 1;
                                                            }
                                                            if($row2['remarks'] == 'LATE'){
                                                                $l2c = $l2c + 1;
                                                            }
                                                            if($row2['remarks'] == 'ABSENT'){
                                                                $a2c = $a2c + 1;
                                                            }
                                                        }
                                                    }
                                                    $final2 = $o2c . '_' . $l2c . '_' . $a2c;
                                                    //Compiling attendance based on subject 3
                                                    $sql3 = "SELECT * FROM student_attendance WHERE student_id = '$st_id' AND subject = '$s3';";
                                                    $result3 = mysqli_query($db, $sql3);
                                                    if (mysqli_num_rows($result3) > 0) {
                                                        while ($row3 = mysqli_fetch_array($result3)) { 
                                                            if($row3['remarks'] == 'ON-TIME'){
                                                                $o3c = $o3c + 1;
                                                            }
                                                            if($row3['remarks'] == 'LATE'){
                                                                $l3c = $l3c + 1;
                                                            }
                                                            if($row3['remarks'] == 'ABSENT'){
                                                                $a3c = $a3c + 1;
                                                            }
                                                        }
                                                    }
                                                    $final3 = $o3c . '_' . $l3c . '_' . $a3c;
                                                    //Compiling attendance based on subject 4
                                                    $sql4 = "SELECT * FROM student_attendance WHERE student_id = '$st_id' AND subject = '$s4';";
                                                    $result4 = mysqli_query($db, $sql4);
                                                    if (mysqli_num_rows($result4) > 0) {
                                                        while ($row4 = mysqli_fetch_array($result4)) { 
                                                            if($row4['remarks'] == 'ON-TIME'){
                                                                $o4c = $o4c + 1;
                                                            }
                                                            if($row4['remarks'] == 'LATE'){
                                                                $l4c = $l4c + 1;
                                                            }
                                                            if($row4['remarks'] == 'ABSENT'){
                                                                $a4c = $a4c + 1;
                                                            }
                                                        }
                                                    }
                                                    $final4 = $o4c . '_' . $l4c . '_' . $a4c;
                                                    //Compiling attendance based on subject 5
                                                    $sql5 = "SELECT * FROM student_attendance WHERE student_id = '$st_id' AND subject = '$s5';";
                                                    $result5 = mysqli_query($db, $sql5);
                                                    if (mysqli_num_rows($result5) > 0) {
                                                        while ($row5 = mysqli_fetch_array($result5)) { 
                                                            if($row5['remarks'] == 'ON-TIME'){
                                                                $o5c = $o5c + 1;
                                                            }
                                                            if($row5['remarks'] == 'LATE'){
                                                                $l5c = $l5c + 1;
                                                            }
                                                            if($row5['remarks'] == 'ABSENT'){
                                                                $a5c = $a5c + 1;
                                                            }
                                                        }
                                                    }
                                                    $final5 = $o5c . '_' . $l5c . '_' . $a5c;
                                                    //Compiling attendance based on subject 6
                                                    $sql6 = "SELECT * FROM student_attendance WHERE student_id = '$st_id' AND subject = '$s6';";
                                                    $result6 = mysqli_query($db, $sql6);
                                                    if (mysqli_num_rows($result6) > 0) {
                                                        while ($row6 = mysqli_fetch_array($result6)) { 
                                                            if($row6['remarks'] == 'ON-TIME'){
                                                                $o6c = $o6c + 1;
                                                            }
                                                            if($row6['remarks'] == 'LATE'){
                                                                $l6c = $l6c + 1;
                                                            }
                                                            if($row6['remarks'] == 'ABSENT'){
                                                                $a6c = $a6c + 1;
                                                            }
                                                        }
                                                    }
                                                    $final6 = $o6c . '_' . $l6c . '_' . $a6c;
                                                    //Compiling attendance based on subject 7
                                                    $sql7 = "SELECT * FROM student_attendance WHERE student_id = '$st_id' AND subject = '$s7';";
                                                    $result7 = mysqli_query($db, $sql7);
                                                    if (mysqli_num_rows($result7) > 0) {
                                                        while ($row7 = mysqli_fetch_array($result7)) { 
                                                            if($row7['remarks'] == 'ON-TIME'){
                                                                $o7c = $o7c + 1;
                                                            }
                                                            if($row7['remarks'] == 'LATE'){
                                                                $l7c = $l7c + 1;
                                                            }
                                                            if($row7['remarks'] == 'ABSENT'){
                                                                $a7c = $a7c + 1;
                                                            }
                                                        }
                                                    }
                                                    $final7 = $o7c . '_' . $l7c . '_' . $a7c;
                                                    //Compiling attendance based on subject 8
                                                    $sql8 = "SELECT * FROM student_attendance WHERE student_id = '$st_id' AND subject = '$s8';";
                                                    $result8 = mysqli_query($db, $sql8);
                                                    if (mysqli_num_rows($result8) > 0) {
                                                        while ($row8 = mysqli_fetch_array($result8)) { 
                                                            if($row8['remarks'] == 'ON-TIME'){
                                                                $o8c = $o8c + 1;
                                                            }
                                                            if($row8['remarks'] == 'LATE'){
                                                                $l8c = $l8c + 1;
                                                            }
                                                            if($row8['remarks'] == 'ABSENT'){
                                                                $a8c = $a8c + 1;
                                                            }
                                                        }
                                                    }
                                                    $final8 = $o8c . '_' . $l8c . '_' . $a8c;
                                                    //Compiling attendance based on subject 9
                                                    $sql9 = "SELECT * FROM student_attendance WHERE student_id = '$st_id' AND subject = '$s9';";
                                                    $result9 = mysqli_query($db, $sql9);
                                                    if (mysqli_num_rows($result9) > 0) {
                                                        while ($row9 = mysqli_fetch_array($result9)) { 
                                                            if($row9['remarks'] == 'ON-TIME'){
                                                                $o9c = $o9c + 1;
                                                            }
                                                            if($row9['remarks'] == 'LATE'){
                                                                $l9c = $l9c + 1;
                                                            }
                                                            if($row9['remarks'] == 'ABSENT'){
                                                                $a9c = $a9c + 1;
                                                            }
                                                        }
                                                    }
                                                    $final9 = $o9c . '_' . $l9c . '_' . $a9c;
                                                    //Compiling attendance based on subject 10
                                                    $sql10 = "SELECT * FROM student_attendance WHERE student_id = '$st_id' AND subject = '$s10';";
                                                    $result10 = mysqli_query($db, $sql10);
                                                    if (mysqli_num_rows($result10) > 0) {
                                                        while ($row10 = mysqli_fetch_array($result10)) { 
                                                            if($row10['remarks'] == 'ON-TIME'){
                                                                $o10c = $o10c + 1;
                                                            }
                                                            if($row10['remarks'] == 'LATE'){
                                                                $l10c = $l10c + 1;
                                                            }
                                                            if($row10['remarks'] == 'ABSENT'){
                                                                $a10c = $a10c + 1;
                                                            }
                                                        }
                                                    }
                                                    $final10 = $o10c . '_' . $l10c . '_' . $a10c;
                                            ?>
                                            <tr>
                                                <td><?php  echo $row['student_id']; ?></td>
                                                <td><?php  echo $row['subject1']; ?></td>

                                                <?php if($row['subject1'] == ''): ?>
                                                    <?php $final1 = ''; ?>
                                                    <td></td>
                                                <?php endif ?>
                                                <?php if($row['subject1'] != ''): ?>
                                                    <td><?php  echo $final1; ?></td>
                                                <?php endif ?>

                                                <td><?php  echo $row['subject2']; ?></td>
                                                <?php if($row['subject2'] == ''): ?>
                                                    <?php $final2 = ''; ?>
                                                    <td></td>
                                                <?php endif ?>
                                                <?php if($row['subject2'] != ''): ?>
                                                    <td><?php  echo $final2; ?></td>
                                                <?php endif ?>

                                                <td><?php  echo $row['subject3']; ?></td>
                                                <?php if($row['subject3'] == ''): ?>
                                                    <?php $final3 = ''; ?>
                                                    <td></td>
                                                <?php endif ?>
                                                <?php if($row['subject3'] != ''): ?>
                                                    <td><?php  echo $final3; ?></td>
                                                <?php endif ?>

                                                <td><?php  echo $row['subject4']; ?></td>
                                                <?php if($row['subject4'] == ''): ?>
                                                    <?php $final4 = ''; ?>
                                                    <td></td>
                                                <?php endif ?>
                                                <?php if($row['subject4'] != ''): ?>
                                                    <td><?php  echo $final4; ?></td>
                                                <?php endif ?>

                                                <td><?php  echo $row['subject5']; ?></td>
                                                <?php if($row['subject5'] == ''): ?>
                                                    <?php $final5 = ''; ?>
                                                    <td></td>
                                                <?php endif ?>
                                                <?php if($row['subject5'] != ''): ?>
                                                    <td><?php  echo $final5; ?></td>
                                                <?php endif ?>

                                                <td><?php  echo $row['subject6']; ?></td>
                                                <?php if($row['subject6'] == ''): ?>
                                                    <?php $final6 = ''; ?>
                                                    <td></td>
                                                <?php endif ?>
                                                <?php if($row['subject6'] != ''): ?>
                                                    <td><?php  echo $final6; ?></td>
                                                <?php endif ?>

                                                <td><?php  echo $row['subject7']; ?></td>
                                                <?php if($row['subject7'] == ''): ?>
                                                    <?php $final7 = ''; ?>
                                                    <td></td>
                                                <?php endif ?>
                                                <?php if($row['subject7'] != ''): ?>
                                                    <td><?php  echo $final7; ?></td>
                                                <?php endif ?>

                                                <td><?php  echo $row['subject8']; ?></td>
                                                <?php if($row['subject8'] == ''): ?>
                                                    <?php $final8 = ''; ?>
                                                    <td></td>
                                                <?php endif ?>
                                                <?php if($row['subject8'] != ''): ?>
                                                    <td><?php  echo $final8; ?></td>
                                                <?php endif ?>

                                                <td><?php  echo $row['subject9']; ?></td>
                                                <?php if($row['subject9'] == ''): ?>
                                                    <?php $final9 = ''; ?>
                                                    <td></td>
                                                <?php endif ?>
                                                <?php if($row['subject9'] != ''): ?>
                                                    <td><?php  echo $final9; ?></td>
                                                <?php endif ?>
                                                
                                                <td><?php  echo $row['subject10']; ?></td>
                                                <?php if($row['subject10'] == ''): ?>
                                                    <?php $final10 = ''; ?>
                                                    <td></td>
                                                <?php endif ?>
                                                <?php if($row['subject10'] != ''): ?>
                                                    <td><?php  echo $final10; ?></td>
                                                <?php endif ?>
                                            </tr>
                                            <?php 
                                                $compilesql = "INSERT INTO compiled_attendance (
                                                    student_id,firstname,middlename,lastname,course_yearlevel_section,
                                                    subject1,ontime1_late1_absent1,subject2,ontime2_late2_absent2,
                                                    subject3,ontime3_late3_absent3,subject4,ontime4_late4_absent4,
                                                    subject5,ontime5_late5_absent5,subject6,ontime6_late6_absent6,
                                                    subject7,ontime7_late7_absent7,subject8,ontime8_late8_absent8,
                                                    subject9,ontime9_late9_absent9,subject10,ontime10_late10_absent10,
                                                    semester,ays,aye)
                                                VALUES('$st_id','$firstname','$middlename','$lastname','$cys','$s1',
                                                '$final1','$s2','$final2','$s3','$final3','$s4','$final4','$s5','$final5',
                                                '$s6','$final6','$s7','$final7','$s8','$final8','$s9','$final9','$s10','$final10',
                                                '$sem','$ays','$aye');";
                                                mysqli_query($db, $compilesql);
                                            ?>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </form>
                                <?php } ?>
                                <?php if (mysqli_num_rows($result) <= 0) {?>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search for Student ID..">
                                        <div class="form-control-icon">
                                            <i data-feather="search"></i>
                                        </div>
                                    </div>
                                </div>
                                <form class="col-md-auto" method='post' style='overflow:scroll; width:100%; height: 400px'>
                                    <table id="myTable" class="table table-bordered table-sm" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th style = "width:8%; font-size: 14px">Student_ID</th>
                                                <th style = "width:24%; font-size: 14px">Name</th>
                                                <th style = "width:24%; font-size: 14px">Email</th>
                                                <th style = "width:4%; font-size: 14px">Status</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div></center>
				</section>
            </div>
        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
		function myFunction() {
		  // Declare variables
		  var input, filter, table, tr, td, i, txtValue;
		  input = document.getElementById("myInput");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("myTable");
		  tr = table.getElementsByTagName("tr");

		  // Loop through all table rows, and hide those who don't match the search query
		  for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[2];
			if (td) {
			  txtValue = td.textContent || td.innerText;
			  if (txtValue.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			  } else {
				tr[i].style.display = "none";
			  }
			}
		  }
		}
	</script>
</body>

</html>