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
        .button {
        padding: 15px 25px;
        font-size: 14px;
        text-align: center;
        cursor: pointer;
        outline: none;
        color: #fff;
        background-color: #db214c;
        border: none;
        border-radius: 15px;
        box-shadow: 0 9px #999;
        }

        .button:hover {background-color: #b01539}

        .button:active {
        background-color: #ff003b;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
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
                    <div class='row'>
                        <div class='col-md-6' style = 'position:relative; padding:6px; left:117px; top:20px'>
                            <h3>My On-Going Class</h3>
                        </div>
                        <div class = 'col-md-6' style = 'border:solid; border-color:#3acf61'>
                            <form class = 'row' method='post'>
                                <div class = 'col-md-8'>
                                    <div class = 'row'>
                                        <div class = 'col-md-6'>
                                            <p><center><strong>Subject: </strong><u><?php echo $_SESSION['selectedsubject'] ?></u></center></p>
                                            <p><center><strong>Section: </strong><u><?php echo $_SESSION['selectedsection'] ?></u></center></p>
                                        </div>
                                        <div class = 'col-md-6'>
                                            <p><center><strong>Time-In: </strong><?php echo $_SESSION['classTimeIn'] ?></center></p>
                                            <p><center><strong>Time-Out: </strong><?php echo $_SESSION['classTimeOut'] ?></center></p>
                                        </div>
                                    </div>
                                </div>
                                <div class = 'col-md-4' style='position:relative; top:24px; left:10px'>
                                    <div class="clearfix" style='position:relative; padding:3px; left:17px; bottom: 10px'>
                                        <input type="submit" name="EndClass" value="End Class" class="button" onclick="buttonFunction()">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
				<br>
                <section class="section">
                    <form class="row mb-4" method='post'>
                        <div class="col-md-6">
                            <div class="card" style='height:490px'>
                                <div class='card-header' style='background-color: gray;'>
                                    <center><h4 style="color: white"><strong>Currently Scanned Student</strong></h4></center>
                                </div>
                                <div class='card-body'>
                                    <br>
                                    <h4><center><strong>Student ID: </strong><?php echo $_SESSION['sstudent_id'] ?></center></h4>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <p style='font-size:18px'><strong>Last Name: </strong></br><u><?php echo $_SESSION['slastname'] ?></u></p>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <p style='font-size:18px'><strong>First Name: </strong></br><u><?php echo $_SESSION['sfirstname'] ?></u></p>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <p style='font-size:18px'><strong>Middle Name: </strong></br><u><?php echo $_SESSION['smiddlename'] ?></u></p>
                                        </div>
                                    </div>
                                    <p style='font-size:18px'><strong>Course/Year/Section For <?php echo $_SESSION['selectedsubject'] ?> : </strong><u><?php echo $_SESSION['sectionSelector'] ?></u></p>
                                    <div class="divider">
                                        <div class="divider-text" style="color: gray; font-size: 12px">Student Status</div>
                                    </div>
                                    <?php if($_SESSION['timeRemarks'] == 'ABSENT'): ?>
                                        <div class="form-group position-relative has-icon-left">
                                            <div class="position-relative">
                                                <div class="form-control-icon">
                                                    <i data-feather="alert-circle" style="color: #fef8f8; padding:1px; position: relative; left:65px; bottom:1px; height:21px; width:21px"></i>
                                                </div>
                                                <center><p style="background-color: #df4759; color: #fef8f8; border-color:#cf4455; padding:6px">Student <?php echo $_SESSION['sstudent_id'] ?> was <?php echo $_SESSION['timeRemarks'] ?>!</p></center>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                    <?php if($_SESSION['timeRemarks'] == 'LATE'): ?>
                                        <div class="form-group position-relative has-icon-left">
                                            <div class="position-relative">
                                                <div class="form-control-icon">
                                                    <i data-feather="info" style="color: #fffdf5; padding:1px; position: relative; left:75px; bottom:1px; height:21px; width:21px"></i>
                                                </div>
                                                <center><p style="background-color: #ffc107; color:#fffdf5; border-color: #ecb40a; padding:10px">Student <?php echo $_SESSION['sstudent_id'] ?> was <?php echo $_SESSION['timeRemarks'] ?>!</p></center>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                    <?php if($_SESSION['timeRemarks'] == 'ON-TIME'): ?>
                                        <div class="form-group position-relative has-icon-left">
                                            <div class="position-relative">
                                                <div class="form-control-icon">
                                                    <i data-feather="check-circle" style="color: #f7fcfb; padding:1px; position: relative; left:60px; bottom:1px; height:21px; width:21px"></i>
                                                </div>
                                                <center><p style="color: #f7fcfb; background-color: #42ba96; border-color: #3ead8e; padding:6px">Student <?php echo $_SESSION['sstudent_id'] ?> was <?php echo $_SESSION['timeRemarks'] ?>!</p></center>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                    <div class="divider">
                                        <div class="divider-text" style="color: gray; font-size: 12px">Select Another Student</div>
                                    </div>
                                    <div class="clearfix" style='position:relative;padding:5px;'>
                                        <center><input type="submit" name="SelectAnotherStudent" value="Scan/Select Student" class="btn btn-primary"></center>
                                        <center><p style='font-size:14px;padding:5px'>Click to Scan/Select Another Student for this Class Schedule</p></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = 'col-md-6' style='position:relative'>
                            <div class="card-header" style="background-color: #3acf61; color:white"><strong><center>Student List of Attendance</center></strong></div>
                            <?php
                                $sqlSelect = "SELECT * FROM student_attendance WHERE subject = '" . $_SESSION['selectedsubject'] . "' and section = '" . $_SESSION['sectionSelector'] . "';";
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
    <script src="assets/js/sweetAlert.js"></script>
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
    <script>
        function buttonFunction(){
            swal('Class Ended.', 'Attendance has been Recorded!', 'success');
        }
    </script>
</body>
</html>