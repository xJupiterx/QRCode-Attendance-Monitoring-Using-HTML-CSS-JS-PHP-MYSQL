<?php 
include('server.php');
include('system-restriction/faculty.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Records</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/scs.png" type="image/x-icon">
    <style>
        .square {
            height: 60vh;
            width: 60vh;
            border-width:2px;
            border-style:solid;
            border-color:black;
        }
        .dropbtn {
            background-color: #04590b;
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
            height: 50px;
        }
        .dropdown {
            position: relative;
            display: block;
        }
        .dropdown-content {
            display: none;
            position: static;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown-content a {
            color: black;
            padding: 8px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {
            background-color: #ddd;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown:hover .dropbtn {
            background-color: #3acf61;
        }
        .button {
        padding: 15px 25px;
        font-size: 14px;
        text-align: center;
        cursor: pointer;
        outline: none;
        color: #fff;
        background-color: #db214c;
        border: none;
        border-radius: 15px;
        box-shadow: 0 9px #999;
        }

        .button:hover {background-color: #b01539}

        .button:active {
        background-color: #ff003b;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
        }
    </style>
</head>
<body>
    <div id="app">
        <?php include('sidebar/faculty_sidebar.html'); ?>
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
                <div class="page-title">
                    <div class='row'>
                        <div class='col-md-6' style = 'position:relative; padding:6px; left:117px; top:20px'>
                            <h3>My On-Going Class</h3>
                        </div>
                        <div class = 'col-md-6' style = 'border:solid; border-color:#3acf61'>
                            <form class = 'row' method='post'>
                                <div class = 'col-md-8'>
                                    <div class = 'row'>
                                        <div class = 'col-md-6'>
                                            <p><center><strong>Subject: </strong><u><?php echo $_SESSION['selectedsubject'] ?></u></center></p>
                                            <p><center><strong>Section: </strong><u><?php echo $_SESSION['selectedsection'] ?></u></center></p>
                                        </div>
                                        <div class = 'col-md-6'>
                                            <p><center><strong>Class Start: </strong><?php echo $_SESSION['classTimeIn'] ?></center></p>
                                        </div>
                                    </div>
                                </div>
                                <div class = 'col-md-4' style='position:relative; top:24px; left:10px'>
                                    <div class="clearfix" style='position:relative; padding:3px; left:17px; bottom: 10px'>
                                        <input type="submit" name="EndClass" value="End Class" class="button" onclick="buttonFunction()">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
				<br>
                <section class="section">
                    <form class="row mb-4" method='post'>
                        <div class="col-md-6">
                            <div class="card" style='height:490px'>
                                <div class='card-header' style='background-color: gray;'>
                                    <center><h4 style="color: white"><strong>Currently Scanned Student</strong></h4></center>
                                </div>
                                <div class='card-body'>
                                    <br>
                                    <h4><center><strong>Student ID: </strong><?php echo $_SESSION['sstudent_id'] ?></center></h4>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <p style='font-size:18px'><strong>Last Name: </strong><?php echo $_SESSION['slastname'] ?>, <?php echo $_SESSION['sfirstname'] ?> <?php echo substr($_SESSION['smiddlename'], 0, 1) ?>.</p>
                                        </div>
                                    </div>
                                    <p style='font-size:18px'><strong>Course/Year/Section For <?php echo $_SESSION['selectedsubject'] ?> : </strong><u><?php echo $_SESSION['sectionSelector'] ?></u></p>
                                    <div class="divider">
                                        <div class="divider-text" style="color: gray; font-size: 12px">Student Status</div>
                                    </div>
                                    <?php if($_SESSION['timeRemarks'] == 'ABSENT'): ?>
                                        <div class="form-group position-relative has-icon-left">
                                            <div class="position-relative">
                                                <div class="form-control-icon">
                                                    <i data-feather="alert-circle" style="color: #fef8f8; padding:1px; position: relative; left:65px; bottom:1px; height:21px; width:21px"></i>
                                                </div>
                                                <center><p style="background-color: #df4759; color: #fef8f8; border-color:#cf4455; padding:6px">Student <?php echo $_SESSION['sstudent_id'] ?> was <?php echo $_SESSION['timeRemarks'] ?>!</p></center>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                    <?php if($_SESSION['timeRemarks'] == 'LATE'): ?>
                                        <div class="form-group position-relative has-icon-left">
                                            <div class="position-relative">
                                                <div class="form-control-icon">
                                                    <i data-feather="info" style="color: #fffdf5; padding:1px; position: relative; left:75px; bottom:1px; height:21px; width:21px"></i>
                                                </div>
                                                <center><p style="background-color: #ffc107; color:#fffdf5; border-color: #ecb40a; padding:10px">Student <?php echo $_SESSION['sstudent_id'] ?> was <?php echo $_SESSION['timeRemarks'] ?>!</p></center>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                    <?php if($_SESSION['timeRemarks'] == 'ON-TIME'): ?>
                                        <div class="form-group position-relative has-icon-left">
                                            <div class="position-relative">
                                                <div class="form-control-icon">
                                                    <i data-feather="check-circle" style="color: #f7fcfb; padding:1px; position: relative; left:60px; bottom:1px; height:21px; width:21px"></i>
                                                </div>
                                                <center><p style="color: #f7fcfb; background-color: #42ba96; border-color: #3ead8e; padding:6px">Student <?php echo $_SESSION['sstudent_id'] ?> was <?php echo $_SESSION['timeRemarks'] ?>!</p></center>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                    <div class="divider">
                                        <div class="divider-text" style="color: gray; font-size: 12px">Select Another Student</div>
                                    </div>
                                    <div class="clearfix" style='position:relative;padding:5px;'>
                                        <center><input type="submit" name="SelectAnotherStudent" value="Scan/Select Student" class="btn btn-primary"></center>
                                        <center><p style='font-size:14px;padding:5px'>Click to Scan/Select Another Student for this Class Schedule</p></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = 'col-md-6' style='position:relative'>
                            <div class="card-header" style="background-color: #3acf61; color:white"><strong><center>Student List of Attendance</center></strong></div>
                            <?php
                                $sqlSelect = "SELECT * FROM student_attendance WHERE subject = '" . $_SESSION['selectedsubject'] . "' and section = '" . $_SESSION['sectionSelector'] . "' and date_of_schedule = '" . $_SESSION['Date'] . "';";
                                $result = mysqli_query($db, $sqlSelect);
                                            
                                if (mysqli_num_rows($result) > 0) {
                            ?>
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
                                            <th style = "width:8%; font-size: 14px">Time-in</th>
                                            <th style = "width:8%; font-size: 14px">Remarks</th>

                                        </tr>
                                    </thead>
                                    <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                        $m = "SELECT middlename FROM student WHERE student_id = '" . $row['student_id'] . "'";
                                        $m = mysqli_query($db,$m);
                                        $m = mysqli_fetch_assoc($m);
                                        $m = reset($m);
                                        $m = substr($m, 0, 1);
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php  echo $row['student_id']; ?></td>
                                            <td><?php  echo $row['lastname']; ?>, <?php  echo $row['firstname']; ?> <?php  echo $m; ?>.</td>
                                            <td><?php  echo $row['stud_time_in']; ?></td>
                                            <?php if($row['remarks']=="ON-TIME"): ?>
                                                <td style="color: #f7fcfb; background-color: #42ba96; border-color: #3ead8e; padding:6px"><center><?php  echo $row['remarks']; ?></center></td>
                                            <?php endif ?>
                                            <?php if($row['remarks']=="LATE"): ?>
                                                <td style="background-color: #ffc107; color:#fffdf5; border-color: #ecb40a; padding:6px"><center><?php  echo $row['remarks']; ?></center></td>
                                            <?php endif ?>
                                            <?php if($row['remarks']=="ABSENT"): ?>
                                                <td style="background-color: #df4759; color: #fef8f8; border-color:#cf4455; padding:6px"><center><?php  echo $row['remarks']; ?></center></td>
                                            <?php endif ?>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </form>
                            <?php } ?>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/sweetAlert.js"></script>
	</script>
    <script>
        function buttonFunction(){
            swal('Class Ended.', 'Attendance has been Recorded!', 'success');
        }
    </script>
</body>
</html>