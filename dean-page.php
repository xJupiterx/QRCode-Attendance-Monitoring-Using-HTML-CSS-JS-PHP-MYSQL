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
                    <h3>Dean Dashboard</h3>
                </div>
				<br>
                <section class="section">
                    <div class="row mb-4">
                        <div class="col-md-8">
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
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #3acf61">
                                    <h4 class="card-title" style="color: white"><strong>Recent Attendance</strong></h4>
                                    <div class="d-flex ">
                                        <i data-feather="download"  style="color: white"></i>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-0">
                                    <div class="table-responsive">
                                    <?php
                                        $sqlSelect = "SELECT * FROM student_attendance";
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
                                                    <th style = "width:8%; font-size: 14px">First name</th>
                                                    <th style = "width:8%; font-size: 14px">Last name</th>
                                                    <th style = "width:8%; font-size: 14px">Subject</th>
                                                    <th style = "width:8%; font-size: 14px">Section</th>
                                                    <th style = "width:8%; font-size: 14px">Remarks</th>

                                                </tr>
                                            </thead>
                                            <?php
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php  echo $row['student_id']; ?></td>
                                                    <td><?php  echo $row['firstname']; ?></td>
                                                    <td><?php  echo $row['lastname']; ?></td>
                                                    <td><?php  echo $row['subject']; ?></td>
                                                    <td><?php  echo $row['section']; ?></td>
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
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class='card-heading p-1 pl-3'>Attendance Graph</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-0 col-0">
                                            <canvas id="bar"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card widget-todo">
                                <div
                                    class="card-header border-bottom d-flex justify-content-between align-items-center">
                                    <h4 class="card-title d-flex">
                                        <i class='bx bx-check font-medium-5 pl-25 pr-75'></i>Progress
                                    </h4>

                                </div>
                                <div class="card-body px-0 py-1">
                                    <table class='table table-borderless'>
                                        <tr>
                                            <td class='col-3'>UI Design</td>
                                            <td class='col-6'>
                                                <div class="progress progress-info">
                                                    <div class="progress-bar" role="progressbar" style="width: 60%"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class='col-3 text-center'>60%</td>
                                        </tr>
                                        <tr>
                                            <td class='col-3'>VueJS</td>
                                            <td class='col-6'>
                                                <div class="progress progress-success">
                                                    <div class="progress-bar" role="progressbar" style="width: 35%"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class='col-3 text-center'>30%</td>
                                        </tr>
                                        <tr>
                                            <td class='col-3'>Laravel</td>
                                            <td class='col-6'>
                                                <div class="progress progress-danger">
                                                    <div class="progress-bar" role="progressbar" style="width: 50%"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class='col-3 text-center'>50%</td>
                                        </tr>
                                        <tr>
                                            <td class='col-3'>ReactJS</td>
                                            <td class='col-6'>
                                                <div class="progress progress-primary">
                                                    <div class="progress-bar" role="progressbar" style="width: 80%"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class='col-3 text-center'>80%</td>
                                        </tr>
                                        <tr>
                                            <td class='col-3'>Go</td>
                                            <td class='col-6'>
                                                <div class="progress progress-secondary">
                                                    <div class="progress-bar" role="progressbar" style="width: 65%"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class='col-3 text-center'>65%</td>
                                        </tr>
                                    </table>
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
		function myFunction() {
		  // Declare variables
		  var input, filter, table, tr, td, i, txtValue;
		  input = document.getElementById("myInput");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("myTable");
		  tr = table.getElementsByTagName("tr");

		  // Loop through all table rows, and hide those who don't match the search query
		  for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[0];
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