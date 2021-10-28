<?php include('server.php'); ?>
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
                    <h3>View Student Complete Information</h3>
                </div></center>
				<br>
                <form class="card " method = 'post'>
                    <div class="card-header" style="background-color: #3acf61">
                        <h4 style="color: white"><center><strong>Edit Student Details</strong></center></h4>
                    </div>
                    <div class="card-body">
						<br><br>
                        <center><h2 class='col-md-6' style=''><b>Student ID: <?php echo $_SESSION['sstudent_id']; ?></b></h2></center>
                        <input type='hidden' name = 'estudent_id' value="<?php echo $_SESSION['sstudent_id']; ?>" style='position:relative;right:80px'>
                        <br><br>
                        <div class = 'row'>
                            <p class='col-md-2' style='font-size:18px;position:relative;'><b>Course:</b></p>
                            <div class = 'col-md-2'>
                                <input type='input' name = 'ecourse' value="<?php echo $_SESSION['scourse']; ?>" style='position:relative; right:95px'>
                            </div>
                            <p class='col-md-2'style='font-size:18px;position:relative; right:15px'><b>Year Level:</b></p>
                            <div class = 'col-md-2'>
                                <input type='input' name = 'eyear' value="<?php echo $_SESSION['syear']; ?>" style='position:relative; right:80px'>
                            </div>
                            <p class='col-md-2' style='font-size:18px;position:relative;'><b>Section:</b></p>
                            <div class = 'col-md-2'>
                                <input type='input' name = 'esection' value="<?php echo $_SESSION['ssection']; ?>" style='position:relative; right:90px'>
                            </div>
                        </div>
                        <div class = 'row'>
                            <p class='col-md-2' style='font-size:18px;position:relative;'><b>First Name:</b></p>
                            <div class = 'col-md-2'>
                                <input type='input' name = 'elastname' value="<?php echo $_SESSION['slastname']; ?>" style='position:relative; right:63px; width:155px'>
                            </div>
                            <p class='col-md-2' style='font-size:18px;position:relative; right:15px'><b>Last Name:</b></p>
                            <div class = 'col-md-2'>
                                <input type='input' name = 'efirstname' value="<?php echo $_SESSION['sfirstname']; ?>" style='position:relative; right:80px; width:188px'>
                            </div>
                            <p class='col-md-2' style='font-size:18px;position:relative;'><b>Middle Name:</b></p>
                            <div class = 'col-md-2'>
                                <input type='input' name = 'emiddlename' value="<?php echo $_SESSION['smiddlename']; ?>" style='position:relative; right:40px; width:138px'>
                            </div>
                        </div>
                        <br><br>
                        <div class='clearfix'>
                            <center>
                            <input type="submit" name="UpdateStudInfo" value="Update Data" class="btn btn-primary">
                            </center>
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: gray; height:30px; position:relative">
                         <h6 style="color: white; position:relative; bottom:3px"><center>Click the data inside input box to modify student data.</center></h6>
                    </div>
                </form>
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