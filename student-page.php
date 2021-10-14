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
	<style>
		.fa {
		  font-size: 50px;
		  cursor: pointer;
		  user-select: none;
		}
		.fa:hover {
		  color: darkblue;
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
                        <li class='sidebar-title' style="color: gray">Main Menu</li>
                        <li class="sidebar-item active ">
                            <a href="student-page.php" class='sidebar-link' style="background-color: #e3e3e3">
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
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
                    <h3> Student Dashboard</h3>
                </div>
				<br>
                <section class="section">
                    <div class="row mb-12">
                        <div class="col-md-12">
                            <div class="card ">
                                <div class="card-header" style="background-color: #3acf61">
                                    <h4 style="color: white"><strong>Student Details</strong></h4>
                                </div>
                                <div class="card-body">
									<br>
                                    <div class='row'>
                                        <img src="assets/images/scs.png", 
                                            style='position: absolute; width: 66px; height:46px; left:47.3%; top:36.3%;'>
									    <center><canvas id="qr-code"></canvas></center>
                                    <div>
									<br>
									<center><p class="col-md-12 col-12"><b>Student ID: </b><?php echo $_SESSION['student_id']; ?></p></center>
									<p class="col-md-4 col-12"><b>Course/Year/Section: </b><?php echo $_SESSION['course']; ?> <?php echo $_SESSION['year']; ?>-<?php echo $_SESSION['section']; ?></p>
									<div class="row">
										<p class="col-md-4 col-12"><b>Last name: </b><u><?php echo $_SESSION['lastname']; ?></u></p>
										<p class="col-md-4 col-12"><b>First name: </b><u><?php echo $_SESSION['firstname']; ?></u></p>
										<p class="col-md-4 col-12"><b>Middle name: </b><u><?php echo $_SESSION['middlename']; ?></u></p>
									</div>
									<p class="col-md-12 col-12"><b>Email: </b><u><?php echo $_SESSION['email']; ?></u></p>
                                </div>
                            </div>
                        </div>
                    </div>
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
	
	<script>
		var qr;
		var my_var = <?php echo $_SESSION['student_id']; ?>;
		
		(function() {
            qr = new QRious({
				element: document.getElementById('qr-code'),
                size: 300,
                value: String(my_var),
            });
        })();
	</script>
</body>

</html>