<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/scs.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <script src="assets/js/qrious.min.js"></script>
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
                <center><div class="page-title">
                    <h3> Student Dashboard</h3>
                </div></center>
				<br>
                <div class="card ">
                    <div class="card-header" style="background-color: #3acf61">
                        <h4 style="color: white"><center><strong>Student Details</strong></center></h4>
                    </div>
                    <div class="card-body">
						<br>
						<center><p class="col-md-12 col-12"><b>Student ID: </b><?php echo $_SESSION['sstudent_id']; ?></p></center>
						<p class="col-md-4 col-12"><b>Course/Year/Section: </b><?php echo $_SESSION['scourse']; ?> <?php echo $_SESSION['syear']; ?>-<?php echo $_SESSION['ssection']; ?></p>
						<div class="row">
							<p class="col-md-4 col-12"><b>Last name: </b><u><?php echo $_SESSION['slastname']; ?></u></p>
							<p class="col-md-4 col-12"><b>First name: </b><u><?php echo $_SESSION['sfirstname']; ?></u></p>
							<p class="col-md-4 col-12"><b>Middle name: </b><u><?php echo $_SESSION['smiddlename']; ?></u></p>
						</div>
                    </div>
                </div>
                <div class="card ">
                    <div class="card-header" style="background-color: #3acf61">
                        <h4 style="color: white"><center><strong>Student Subjects and Section</strong></center></h4>
                    </div>
                    <div class="card-body">
                        <br>
                        <div class = 'row'>
                            <div class = 'col-md-2' style='border-style:solid; border-right-style:dotted;'>
                                <center><p style='position:relative; top:7px'><strong>SUBJECT</strong></p></center>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-left-style:none'>
                                <center><p style='position:relative; top:7px'><strong>SECTION</strong></p></center>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-right-style:dotted'>
                                <center><p style='position:relative; top:7px'><strong>SUBJECT</strong></p></center>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-left-style:none'>
                                <center><p style='position:relative; top:7px'><strong>SECTION</strong></p></center>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-right-style:dotted'>
                                <center><p style='position:relative; top:7px'><strong>SUBJECT</strong></p></center>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-left-style:none'>
                                <center><p style='position:relative; top:7px'><strong>SECTION</strong></p></center>
                            </div>
                        </div>
                        <div class = 'row'>
                            <div class = 'col-md-2' style='border-style:solid; border-right-style:dotted;'>
                                <center><p style='position:relative; top:7px'><strong><?php echo $_SESSION['subject1'] ?></strong></p></center>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-left-style:none'>
                                <center><p style='position:relative; top:7px'><strong><?php echo $_SESSION['section1'] ?></strong></p></center>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-right-style:dotted'>
                                <center><p style='position:relative; top:7px'><strong><?php echo $_SESSION['subject2'] ?></strong></p></center>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-left-style:none'>
                                <center><p style='position:relative; top:7px'><strong><?php echo $_SESSION['section2'] ?></strong></p></center>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-right-style:dotted'>
                                <center><p style='position:relative; top:7px'><strong><?php echo $_SESSION['subject3'] ?></strong></p></center>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-left-style:none'>
                                <center><p style='position:relative; top:7px'><strong><?php echo $_SESSION['section3'] ?></strong></p></center>
                            </div>
                        </div>  
                        <div class='row'>
                            <div class = 'col-md-2' style='border-style:solid; border-right-style:dotted; border-top:none'>
                                <center><p style='position:relative; top:7px'><strong><?php echo $_SESSION['subject4'] ?></strong></p></center>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-left-style:none; border-top:none'>
                                <center><p style='position:relative; top:7px'><strong><?php echo $_SESSION['section4'] ?></strong></p></center>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-right-style:dotted; border-top:none'>
                                <center><p style='position:relative; top:7px'><strong><?php echo $_SESSION['subject5'] ?></strong></p></center>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-left-style:none; border-top:none'>
                                <center><p style='position:relative; top:7px'><strong><?php echo $_SESSION['section5'] ?></strong></p></center>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-right-style:dotted; border-top:none'>
                                <center><p style='position:relative; top:7px'><strong><?php echo $_SESSION['subject6'] ?></strong></p></center>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-left-style:none; border-top:none'>
                                <center><p style='position:relative; top:7px'><strong><?php echo $_SESSION['section6'] ?></strong></p></center>
                            </div>
                        </div>
                        <div class = 'row'>
                            <div class = 'col-md-2' style='border-style:solid; border-right-style:dotted; border-top:none'>
                                <center><p style='position:relative; top:7px'><strong><?php echo $_SESSION['subject7'] ?></strong></p></center>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-left-style:none; border-top:none'>
                                <center><p style='position:relative; top:7px'><strong><?php echo $_SESSION['section7'] ?></strong></p></center>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-right-style:dotted; border-top:none'>
                                <center><p style='position:relative; top:7px'><strong><?php echo $_SESSION['subject8'] ?></strong></p></center>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-left-style:none; border-top:none'>
                                <center><p style='position:relative; top:7px'><strong><?php echo $_SESSION['section8'] ?></strong></p></center>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-right-style:dotted; border-top:none'>
                                <center><p style='position:relative; top:7px'><strong><?php echo $_SESSION['subject9'] ?></strong></p></center>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-left-style:none; border-top:none'>
                                <center><p style='position:relative; top:7px'><strong><?php echo $_SESSION['section9'] ?></strong></p></center>
                            </div>
                        </div>
                        <div class = 'row'>
                            <div class = 'col-md-2' style='border-style:solid; border-right-style:dotted; height:45px; border-top:none'>
                                <center><p style='position:relative; top:7px'><strong><?php echo $_SESSION['subject10'] ?></strong></p></center>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-left-style:none; border-top:none'>
                                <center><p style='position:relative; top:7px'><strong><?php echo $_SESSION['section10'] ?></strong></p></center>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-right-style:dotted; border-top:none'>
                            <p></p>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-left-style:none; border-top:none'>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-right-style:dotted; border-top:none'>
                            </div>
                            <div class = 'col-md-2' style='border-style:solid; border-left-style:none; border-top:none'>
                            </div>
                        </div>
                    </div>
                </div>
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