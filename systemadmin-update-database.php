<?php 
include('server.php');
include('system-restriction/systemadmin.php');
?>
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
        <?php include('sidebar/sysad_sidebar.html') ?>
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