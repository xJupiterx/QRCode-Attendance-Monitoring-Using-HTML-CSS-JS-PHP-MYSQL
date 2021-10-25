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
                    <h3>Scan/Select Another Student</h3>
                </div>
				<br>
                <section class="section">
                    <form class="row mb-4" action="dean-qrscanner.php" method="POST">
                        <div class="col-md-8">
                            <div class="card">
                                <div class='card-header' style='background-color: #3acf61;'>
                                    <center><h4 style="color: white"><strong>Scan QR Code</strong></h4></center>
                                </div>
                                <div class='card-body'>
                                    <br>
                                    <div>
                                        <video id="preview" width="100%"></video>
                                    </div>
                                </div>
                                <div class="card-footer" style="background-color: #3acf61;">
                                    <input type="hidden" name="scannedqr" id="text" readonyy="" placeholder="scan qrcode" class="form-control">
                                    <center><p id="test1" style="color: #b31d2c; position:relative; top:7px" ><strong>Scanning...</strong></p></center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="position:relative; height:200px">
                                <div class="card-header" style="background-color: #3acf61">
                                    <h4 style="color:white"><center>Selected Schedule</center></h4>
                                </div>
                                <div class="card-body">
                                    <br>
                                    <div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <center>
                                                        <p style= "font-size:13px;"><strong>Selected Subject:</strong></p>
                                                    </center>
                                                    <center>
                                                        <input type="hidden" name="subject" value = "<?php echo $_SESSION['currentSubject'] ?>" >
                                                        <p style= "font-size:14px;"><strong><u><?php echo $_SESSION['currentSubject'] ?></u></strong></p>
                                                    </center>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <center>
                                                        <p style= "font-size:13px;"><strong>Selected Section:</strong></p>
                                                    </center>
                                                    <center>
                                                        <input type="hidden" name="section" value = "<?php echo $_SESSION['currentSection'] ?>" >
                                                        <p style= "font-size:14px;"><strong><u><?php echo $_SESSION['currentSection'] ?></u></strong></p>
                                                    </center>
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
                                                        <p style= "font-size:13px;"><strong>Selected Time-In:</strong></p>
                                                    </center>
                                                    <center>
                                                        <input type="hidden" name="time-in" value = "<?php echo $_SESSION['currentTimein'] ?>" >
                                                        <p style= "font-size:14px;"><strong><u><?php echo $_SESSION['currentTimein'] ?></u></strong></p>
                                                    </center>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style='position:relative; bottom:50px'>
                                                <div>
                                                    <center>
                                                        <p style= "font-size:13px;"><strong>Selected Time-Out:</strong></p>
                                                    </center>
                                                    <center>
                                                        <input type="hidden" name="time-out" value = "<?php echo $_SESSION['currentTimeout'] ?>" >
                                                        <p style= "font-size:14px;"><strong><u><?php echo $_SESSION['currentTimeout'] ?></u></strong></p>
                                                    </center>
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
                                        <input type="submit" name="selectStud" value="Select Another Student" class="btn btn-primary float-end">
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