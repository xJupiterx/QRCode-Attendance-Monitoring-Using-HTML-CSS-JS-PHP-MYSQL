<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dean Dashboard</title>
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
    </style>
</head>
<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <center>
					<div class="sidebar-header" style="background-color: #3acf61">
						<img src="assets/images/scs.png">
						<br>
						<a style="color:white;font-size:22px;">School of Computer Studies</a>
					</div>	
				</center>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <div class="divider">
                            <div class="divider-text" style="color: gray; font-size: 12px">Main Menu</div>
                        </div>
                        <li class="sidebar-item active ">
                            <a href="dean-page.php" class='sidebar-link' style="background-color: #e3e3e3">
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link' style="background-color: #e3e3e3">
                                <i data-feather="book" width="20"></i>
                                <span>Attendance Monitoring</span>
                            </a>
                            <ul class="submenu " style="background-color: #e3e3e3">
                                <li>
                                    <a href="dean-student-info.php">View Student's Information</a>
                                </li>
                                <li>
                                    <a href="dean-student-attendance.php">View Student's Attendance</a>
                                </li>
                            </ul>
                        </li>
						<div class="divider">
                            <div class="divider-text" style="color: gray; font-size: 12px">More Options</div>
                        </div>
						<li class="sidebar-item active ">
                            <a href="dean-createacc.php" class='sidebar-link' style="background-color: #e3e3e3">
                                <i data-feather="plus" width="20"></i>
                                <span>Create Faculty Account</span>
                            </a>
                        </li>
						<li class="sidebar-item active ">
                            <a href="dean-update-database.php" class='sidebar-link' style="background-color: #e3e3e3">
                                <i data-feather="database" width="20"></i>
                                <span>Update Student Database</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
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
                                    <img src="assets/images/avatar/<?php echo $_SESSION['lastname']; ?>.jpg" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, <?php echo $_SESSION['lastname']; ?>, <?php echo $_SESSION['firstname']; ?>!</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login.php"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>Attendance Recording</h3>
                </div>
				<br>
                <section class="section">
                    <form class="row mb-4" action="dean-qrscanner.php" method="POST">
                        <div class="col-md-8">
                            <div class="card">
                                <div class='card-header' style='background-color: #3acf61;'>
                                    <center><h4 style="color: white"><strong>Scan QR Code</strong></h4></center>
                                </div>
                                <center><div class='square' style='padding:20px'></div></center>
                                <div class="card-footer" style="background-color: #3acf61; height: 60px; position: sticky; padding: 20px;">
                                    <center><p style="color: #b31d2c"><strong>Scanning...</strong></p></center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="position:relative; height:200px">
                                <div class="card-header" style="background-color: #3acf61">
                                    <h4 style="color:white"><center>Schedule Selector</center></h4>
                                </div>
                                <div class="card-body">
                                    <br>
                                    <div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <center>
                                                        <p style= "font-size:14px;"><strong>Select Subject:</strong></p>
                                                    </center>
                                                    <div class="dropdown">
                                                        <Select class="body_text" name="subject" onchange="getSubject()" id='SelectedSubject'>
                                                            <option value="Please Select"> Please Select </option>
                                                            <?php include("PHPRequestDatas/subjects.php"); ?> 
                                                        </select>
                                                        <br><br>
                                                        <div id="subject" style="color:Green; font-size: 13px; font-weight:bold; position:relative"> </div>
                                                    </div>
                                                    <script language="JavaScript">
                                                        function getSubject() {
                                                            document.getElementById("subject").innerHTML = document.getElementById("SelectedSubject").value
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <center>
                                                        <p style= "font-size:14px;"><strong>Select Section:</strong></p>
                                                    </center>
                                                    <div class="dropdown">
                                                        <Select class="body_text" name="section" onchange="getSection()" id='SelectedSection'>
                                                            <option value="Please Select"> Please Select </option>
                                                            <?php include("PHPRequestDatas/sections.php"); ?>
                                                        </select>
                                                        <br><br>
                                                        <div id="section" style="color:Green; font-size: 13px; font-weight:bold; position:relative"> </div>
                                                    </div>
                                                    <script language="JavaScript">
                                                        function getSection() {
                                                            document.getElementById("section").innerHTML = document.getElementById("SelectedSection").value
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="position:relative; height:140px; bottom:60px; border-top-style:hidden">
                                <div class="card-body">
                                    <br>
                                    <div>
                                        <div class="row">
                                            <div class="col-md-6" style='position:relative; bottom:50px'>
                                                <div>
                                                    <center>
                                                        <p style= "font-size:14px;"><strong>Select Time-In:</strong></p>
                                                    </center>
                                                    <div class="dropdown">
                                                        <Select class="body_text" name="time-in">
                                                            <option value="Please Select"> Please Select </option>
                                                            <option value="06:00"> 06:00 </option>
                                                            <option value="06:30"> 06:30 </option>
                                                            <option value="07:00"> 07:00 </option>
                                                            <option value="07:30"> 07:30 </option>
                                                            <option value="08:00"> 08:00 </option>
                                                            <option value="08:30"> 08:30 </option>
                                                            <option value="09:00"> 09:00 </option>
                                                            <option value="09:30"> 09:30 </option>
                                                            <option value="10:00"> 10:00 </option>
                                                            <option value="10:30"> 10:30 </option>
                                                            <option value="11:00"> 11:00 </option>
                                                            <option value="11:30"> 11:30 </option>
                                                            <option value="12:00"> 12:00 </option>
                                                            <option value="12:30"> 12:30 </option>
                                                            <option value="13:00"> 13:00 </option>
                                                            <option value="13:30"> 13:30 </option>
                                                            <option value="14:00"> 14:00 </option>
                                                            <option value="14:30"> 14:30 </option>
                                                            <option value="15:00"> 15:00 </option>
                                                            <option value="15:30"> 15:30 </option>
                                                            <option value="16:00"> 16:00 </option>
                                                            <option value="16:30"> 16:30 </option>
                                                            <option value="17:00"> 17:00 </option>
                                                            <option value="17:30"> 17:30 </option>
                                                            <option value="18:00"> 18:00 </option>
                                                            <option value="18:30"> 18:30 </option>
                                                            <option value="19:00"> 19:00 </option>
                                                            <option value="19:30"> 19:30 </option>
                                                            <option value="20:00"> 20:00 </option>
                                                            <option value="20:30"> 20:30 </option>
                                                            <option value="21:00"> 21:00 </option>
                                                            <option value="21:30"> 21:30 </option>
                                                            <option value="22:00"> 22:00 </option>
                                                            <option value="22:30"> 22:30 </option>
                                                            <option value="23:00"> 23:00 </option>
                                                            <option value="23:30"> 23:30 </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style='position:relative; bottom:50px'>
                                                <div>
                                                    <center>
                                                        <p style= "font-size:14px;"><strong>Select Time-Out:</strong></p>
                                                    </center>
                                                    <div class="dropdown">
                                                        <Select class="body_text" name="time-out">
                                                            <option value="Please Select"> Please Select </option>
                                                            <option value="06:00"> 06:00 </option>
                                                            <option value="06:30"> 06:30 </option>
                                                            <option value="07:00"> 07:00 </option>
                                                            <option value="07:30"> 07:30 </option>
                                                            <option value="08:00"> 08:00 </option>
                                                            <option value="08:30"> 08:30 </option>
                                                            <option value="09:00"> 09:00 </option>
                                                            <option value="09:30"> 09:30 </option>
                                                            <option value="10:00"> 10:00 </option>
                                                            <option value="10:30"> 10:30 </option>
                                                            <option value="11:00"> 11:00 </option>
                                                            <option value="11:30"> 11:30 </option>
                                                            <option value="12:00"> 12:00 </option>
                                                            <option value="12:30"> 12:30 </option>
                                                            <option value="13:00"> 13:00 </option>
                                                            <option value="13:30"> 13:30 </option>
                                                            <option value="14:00"> 14:00 </option>
                                                            <option value="14:30"> 14:30 </option>
                                                            <option value="15:00"> 15:00 </option>
                                                            <option value="15:30"> 15:30 </option>
                                                            <option value="16:00"> 16:00 </option>
                                                            <option value="16:30"> 16:30 </option>
                                                            <option value="17:00"> 17:00 </option>
                                                            <option value="17:30"> 17:30 </option>
                                                            <option value="18:00"> 18:00 </option>
                                                            <option value="18:30"> 18:30 </option>
                                                            <option value="19:00"> 19:00 </option>
                                                            <option value="19:30"> 19:30 </option>
                                                            <option value="20:00"> 20:00 </option>
                                                            <option value="20:30"> 20:30 </option>
                                                        </select>
                                                        <br><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($sserrorcount > 0):?>
                                                <div style='position:relative; bottom:50px'>
                                                    <center><p style="color:red;"><?php echo $sserrors?></p></center>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style='height: 200px; position:relative; bottom:83px'>
                                <div class="card-header" style="background-color: #7a7777">
                                    <h4 style="color:white"><center>Student ID Manual Selector</center></h4>
                                </div>
                                <div class="card-body">
                                    <br>
                                    <div class="position-relative" style='width:100%;'>
                                        <input type="text" name="student_id" class="form-control" id="student_id" placeholder='Enter Student ID'>
                                    </div>
                                    <div class="clearfix" style='position:relative;'>
                                        <input type="submit" name="selectStud" value="Select Student" class="btn btn-primary float-end">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>