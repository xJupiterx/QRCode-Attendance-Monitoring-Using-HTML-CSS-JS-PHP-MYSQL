<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recent Student Attendance</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/scs.png" type="image/x-icon">
    <style>
        #myInput {
            box-sizing: border-box;
            background-image: url('searchicon.png');
            background-position: 14px 12px;
            background-repeat: no-repeat;
            font-size: 16px;
            padding: 14px 20px 12px 45px;
            border: none;
            border-bottom: 1px solid #ddd;
        }
        #myInput:focus {outline: 3px solid #ddd;}
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
                    <h3>Sorted Student Attendance</h3>
                </div>
				<br>
                <section class="section">
                    <div class="row mb-4">
                        <div class="col-md-8">
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
                                            $sqlSelect = "SELECT * FROM student_attendance WHERE subject = '" . $_SESSION['SortSubject'] . "' and section = '" . $_SESSION['SortSection'] . "' ORDER BY attendance_id DESC;";
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
                                                        <th style = "width:8%; font-size: 14px">Subject</th>
                                                        <th style = "width:10%; font-size: 14px">Section</th>
                                                        <th style = "width:8%; font-size: 14px">Student_ID</th>
                                                        <th style = "width:8%; font-size: 14px">First name</th>
                                                        <th style = "width:8%; font-size: 14px">Last name</th>
                                                        <th style = "width:8%; font-size: 14px">Time-In</th>
                                                        <th style = "width:8%; font-size: 14px">Remarks</th>
                                                        <th style = "width:8%; font-size: 14px">Date</th>

                                                    </tr>
                                                </thead>
                                                <?php
                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php  echo $row['subject']; ?></td>
                                                        <td><?php  echo $row['section']; ?></td>
                                                        <td><?php  echo $row['student_id']; ?></td>
                                                        <td><?php  echo $row['firstname']; ?></td>
                                                        <td><?php  echo $row['lastname']; ?></td>
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
                                                        <td><?php  echo $row['date_of_schedule']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </form>
                                        <?php } ?>

                                        <?php if (mysqli_num_rows($result) <= 0) {?>
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
                                                        <th style = "width:8%; font-size: 14px">Subject</th>
                                                        <th style = "width:8%; font-size: 14px">Section</th>
                                                        <th style = "width:8%; font-size: 14px">Student_ID</th>
                                                        <th style = "width:8%; font-size: 14px">First name</th>
                                                        <th style = "width:8%; font-size: 14px">Last name</th>
                                                        <th style = "width:8%; font-size: 14px">Remarks</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <form class="card" method = 'post'>
                                <div class="card-header" style = "background-color:gray">
                                    <h3 class='card-heading' style = "color:white">Sort by Subject-Section</h3>
                                </div>
                                <div class="card-body">
                                    <br>
                                    <div class = 'row'>
                                        <div class="col-md-6">
                                            <div>
                                                <center>
                                                    <p style= "font-size:14px;"><strong>Select Subject:</strong></p>
                                                </center>
                                                <div class="dropdown">
                                                    <Select class="body_text" name="subject" id='SelectedSubject' style = 'width:90px'>
                                                        <option value="Please Select"> Select </option>
                                                        <?php include("PHPRequestDatas/subjects.php"); ?> 
                                                    </select>
                                                    <br><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div>
                                                <center>
                                                    <p style= "font-size:14px;"><strong>Select Section:</strong></p>
                                                </center>
                                                <div class="dropdown">
                                                    <Select class="body_text" name="section" id='SelectedSection' style = 'width:90px'>
                                                        <option value="Please Select"> Select </option>
                                                        <?php include("PHPRequestDatas/sections.php"); ?>
                                                    </select>
                                                    <br><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                            <center><input type="submit" name="sort" value="Sort Attendance" class="btn btn-primary"></center>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a style = "font-size:12px; color:black" href = "dean-sortby-stud_id.php">Click <u>HERE</u> to display attendance of selected student</a>
                                </div>
                            </form>
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
			td = tr[i].getElementsByTagName("td")[2];
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