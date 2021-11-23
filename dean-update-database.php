<?php include 'server.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Database</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">
	<link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
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

            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>Update Database</h3>
                </div>
				<br>
                <div class="col-md-11">
					<div class="card">
						<div class="card-header" style="background-color: #3acf61">
							<h4 style="color: white"><strong>Update Student Database</strong></h4>
						</div>
						<form class="card-body" action="" method="post" name="uploadCSV" enctype="multipart/form-data">
							<br>
                            <div class="row">
                                <div class="dropdown col-md-6" style="border:solid; border-color:#3acf61; padding:4px">
                                    <center><p style="font-size: 17px;"><strong>Select Semester for this File</strong></p></center>
                                    <center><Select class="body_text" name="semester" id='SelectedSemester'>
                                        <option value="Please Select">Please Select Semester</option>
                                        <option value="1st Semester">1st Semester</option>
                                        <option value="2nd Semester">2nd Semester</option>
                                        <option value="3rd Semester">3rd Semester</option>
                                    </select></center>
                                    <div id="semester" style="color:Green; font-size: 13px; font-weight:bold; position:relative"> </div>
                                </div>
                                <div class="col-md-6" style="border:solid; border-color:#3acf61; padding:4px">
                                    <center><p style="font-size: 17px;"><strong>Select Academic Year</strong></p></center>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <center><div class="position-relative" style="width:180px; position:relative; left:10px">
                                                <input type="text" name="startyear" class="form-control" id="startyear" placeholder="Starting Year">
                                            </div></center>
                                        </div>
                                        <div class="col-md-4" style="position:relative; width:115px; left:50px; top:7px">-TO-</div>
                                        <div class="col-md-4">
                                            <center><div class="position-relative" style="width:180px; position:relative; right:10px">
                                                <input type="text" name="endyear" class="form-control" id="endyear" placeholder="Ending Year">
                                            </div></center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
							<label class="col-md-4 control-label">Please select csv file</label>
							<input type="file" name="file" id="file" accept=".csv">
							<button type="submit" id="submit" name="import" class="btn-submit" style="background-color: #9e9d9b" onclick="myFunction()">Import</button>
							<br>
							<br>
							<div class="divider">
								<div class="divider-text" style="color: gray; font-size: 12px"><strong>NOTE</strong></div>
							</div>
							<div style="color: gray; font-size: 12px">
								<label class="col-md-12"><strong>* Updating DATABASE will permanently DELETE current STUDENT LIST (including ATTENDANCE) and replace with new uploaded list.</strong></label>
								<label class="col-md-12"><strong>* Updating DATABASE will automatically generate a compiled list of students (including ATTENDANCE)</strong></label>
								<label class="col-md-12"><strong>* Updating DATABASE must be done before semester STARTS.</strong></label>
							</div>
						</form>
					</div>
				</div>
            </div>
        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
    <script src="assets/js/main.js"></script>
	<script src="assets/js/csv.js"></script>
	<script src="assets/js/datatable.js"></script>
    <script src="assets/js/sweetAlert.js"></script>
    <script>
        function myFunction(){
            swal('Update Database', 'Database Successfully Updated', 'success');
        }
    </script>
</body>
</html>