<?php 
include('server.php'); 
include('system-restriction/dean.php');
?>
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
        <?php include('sidebar/dean_sidebar.html'); ?>
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
                    <h3>Student Attendance</h3>
                </div>
				<br>
                <section class="section">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #3acf61">
                                    <h4 class="card-title" style="color: white"><strong>Recent Attendance</strong></h4>
                                    <div class="d-flex ">
                                        <i data-feather="download"  style="color: white; position:relative; top:10px"></i>
                                        <?php include('PHPRequestDatas/compile_attendance.php'); ?>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-0">
                                    <div class="table-responsive">
                                        <?php
                                            $sqlSelect = "SELECT * FROM student_attendance ORDER BY attendance_id DESC;";
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
                                                        <th style = "width:8%; font-size: 14px">Section</th>
                                                        <th style = "width:8%; font-size: 14px">Student_ID</th>
                                                        <th style = "width:24%; font-size: 14px">Name</th>
                                                        <th style = "width:8%; font-size: 14px">Remarks</th>

                                                    </tr>
                                                </thead>
                                                <?php
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $m = "SELECT middlename FROM student WHERE student_id = '" . $row['student_id'] . "'";
                                                    $m = mysqli_query($db,$m);
                                                    $m = mysqli_fetch_assoc($m);
                                                    $m = reset($m);
                                                    $m = substr($m, 0, 1);
                                                ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php  echo $row['subject']; ?></td>
                                                        <td><?php  echo $row['section']; ?></td>
                                                        <td><?php  echo $row['student_id']; ?></td>
                                                        <td><?php  echo $row['lastname']; ?>, <?php  echo $row['firstname']; ?> <?php  echo $m; ?>.</td>
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
                                                        <th style = "width:8%; font-size: 14px">Name</th>
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
    <script src="assets/js/app.js"></script>
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