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
                        <li class="sidebar-item active ">
                            <a href="dean-student-info.php" class='sidebar-link' style="background-color: #e3e3e3">
                                <i data-feather="users" width="20"></i>
                                <span>View Student's Information</span>
                            </a>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link' style="background-color: #e3e3e3">
                                <i data-feather="book" width="20"></i>
                                <span>Attendance Monitoring</span>
                            </a>
                            <ul class="submenu " style="background-color: #e3e3e3">
                                <li>
                                    <a href="dean-student-attendance.php">Start A Class</a>
                                </li>
                                <li>
                                    <a href="dean-attendance-viewer.php">View Student's Attendance</a>
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

            <form class="main-content container-fluid" method = 'post' action = 'dean-page.php'>
                <div class="page-title">
                    <h3>Dean Dashboard</h3>
                </div>
				<br>
                <section class="section">
                    <div class="row mb-4">
                        <div class = "col-md-12">
                            <div class="card ">
                                <div class="card-header" style="background-color: #3acf61">
                                    <h4 style="color: white"><strong>User Details</strong></h4>
                                </div>
                                <div class="card-body">
									<br>
									<center><p class="col-md-12 col-12"><b>Access Level: </b><u><?php echo $_SESSION['accesslevel']; ?></u></p></center>
									<div class="row">
										<p class="col-md-4 col-12"><b>Last name: </b><u><?php echo $_SESSION['lastname']; ?></u></p>
										<p class="col-md-4 col-12"><b>First name: </b><u><?php echo $_SESSION['firstname']; ?></u></p>
										<p class="col-md-4 col-12"><b>Middle name: </b><u><?php echo $_SESSION['middlename']; ?></u></p>
									</div>
									<p class="col-md-12 col-12"><b>Email: </b><u><?php echo $_SESSION['email']; ?></u></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #3acf61">
                                    <h4 class="card-title" style="color: white"><strong>Return to My Class</strong></h4>
                                </div>
                                <div class="card-body">
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <center><div>
                                                    <p style= "font-size:14px;"><strong>Select Subject:</strong></p>
                                                <div class="dropdown">
                                                    <Select class="body_text" name="rsubject" id='SelectedSubject'>
                                                        <option value="Please Select"> Please Select </option>
                                                        <?php include("PHPRequestDatas/subjects.php"); ?> 
                                                    </select>
                                                    <br><br>
                                                </div>
                                            </div></center>
                                        </div>
                                        <div class="col-md-6">
                                            <center><div>
                                                    <p style= "font-size:14px;"><strong>Select Section:</strong></p>
                                                <div class="dropdown">
                                                    <Select class="body_text" name="rsection" id='SelectedSection'>
                                                        <option value="Please Select"> Please Select </option>
                                                        <?php include("PHPRequestDatas/sections.php"); ?>
                                                    </select>
                                                    <br><br>
                                                </div>
                                            </div></center>
                                        </div>
                                    </div>
                                    <br>
                                    <center><div class="clearfix" style='position:relative;'>
                                        <input type="submit" name="returnClass" value="Return Class" class="btn btn-primary">
                                    </div></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
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