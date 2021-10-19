<?php include 'server.php'; 
if (isset($_POST["import"])) {
	$fileName = $_FILES["file"]["tmp_name"];
	$accesslevel = "STUDENT";
	if ($_FILES["file"]["size"] > 0) {
		$file = fopen($fileName, "r");
		$find_header=1;
		while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
			$find_header++;
			if( $find_header > 2 ) {
				$sqlInsert = "INSERT into student (student_id, lastname, firstname, middlename, username, email, password, course, year, section,
								subject1, section1, subject2, section2, subject3, section3, subject4, section4, subject5, section5,
								subject6, section6, subject7, section7, subject8, section8, subject9, section9, subject10, section10)
					   values ('" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[3] . "','" . $column[1] . "','" . $column[4] . "','" . $column[7] . "','" . $column[8] . "','" . $column[9] . "'
					   			,'" . $column[10] . "','" . $column[11] . "','" . $column[13] . "','" . $column[14] . "','" . $column[16] . "','" . $column[17] . "'
								,'" . $column[19] . "','" . $column[20] . "','" . $column[22] . "','" . $column[23] . "','" . $column[25] . "','" . $column[26] . "'
								,'" . $column[28] . "','" . $column[29] . "','" . $column[31] . "','" . $column[32] . "','" . $column[34] . "','" . $column[35] . "'
								,'" . $column[37] . "','" . $column[38] . "')";
				$addStudentAcc = "INSERT INTO user (lastname,firstname,middlename,username,email,password,accesslevel)
					   values ('" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[3] . "','" . $column[1] . "','" . $column[4] . "','$accesslevel')";
				$result = mysqli_query($db, $sqlInsert);
				mysqli_query($db, $addStudentAcc);
				if (!empty($result)) {
					$type = "success";
					$message = "CSV Data Imported into the Database";
				} else {
					$type = "error";
					$message = "Problem in Importing CSV Data";
				}
			}
		}
	}
}
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
	<style>
		.tbl{
			table.dataTable thead .sorting:after,
			table.dataTable thead .sorting:before,
			table.dataTable thead .sorting_asc:after,
			table.dataTable thead .sorting_asc:before,
			table.dataTable thead .sorting_asc_disabled:after,
			table.dataTable thead .sorting_asc_disabled:before,
			table.dataTable thead .sorting_desc:after,
			table.dataTable thead .sorting_desc:before,
			table.dataTable thead .sorting_desc_disabled:after,
			table.dataTable thead .sorting_desc_disabled:before {
			bottom: .5em;
			}
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
							<label class="col-md-4 control-label">Please select csv file</label>
							<input type="file" name="file" id="file" accept=".csv">
							<button type="submit" id="submit" name="import" class="btn-submit" onclick="myFunction()" style="background-color: #9e9d9b">Import</button>
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
				<section class="col-md-12">
					<div class="card">
						<div class="card-header">Current Student Records</div>
						<?php
							$sqlSelect = "SELECT * FROM student";
							$result = mysqli_query($db, $sqlSelect);
										
							if (mysqli_num_rows($result) > 0) {
						?>
						<div class="col-md-12" style="overflow: scroll; height:500px; width:100%;">
							<table id="myTable" class="table table-bordered table-sm" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th style = "width:10%; font-size: 14px">Student_ID</th>
										<th style = "width:10%; font-size: 14px"><center>Last name</center></th>
										<th style = "width:10%; font-size: 14px"><center>First name</center></th>
										<th style = "width:10%; font-size: 14px"><center>Middle name</center></th>
										<th style = "width:10%; font-size: 14px">Email</th>
										<th style = "width:10%; font-size: 14px">Username</th>
										<th style = "width:10%; font-size: 14px">Password</th>
										<th style = "width:10%; font-size: 14px">Course-Year-Section</th>
										<th style = "width:10%; font-size: 14px">Subject#1</th>
										<th style = "width:10%; font-size: 14px">Section#1</th>
										<th style = "width:10%; font-size: 14px">Subject#2</th>
										<th style = "width:10%; font-size: 14px">Section#2</th>
										<th style = "width:10%; font-size: 14px">Subject#3</th>
										<th style = "width:10%; font-size: 14px">Section#3</th>
										<th style = "width:10%; font-size: 14px">Subject#4</th>
										<th style = "width:10%; font-size: 14px">Section#4</th>
										<th style = "width:10%; font-size: 14px">Subject#5</th>
										<th style = "width:10%; font-size: 14px">Section#5</th>
										<th style = "width:10%; font-size: 14px">Subject#6</th>
										<th style = "width:10%; font-size: 14px">Section#6</th>
										<th style = "width:10%; font-size: 14px">Subject#7</th>
										<th style = "width:10%; font-size: 14px">Section#7</th>
										<th style = "width:10%; font-size: 14px">Subject#8</th>
										<th style = "width:10%; font-size: 14px">Section#8</th>
										<th style = "width:10%; font-size: 14px">Subject#9</th>
										<th style = "width:10%; font-size: 14px">Section#9</th>
										<th style = "width:10%; font-size: 14px">Subject#10</th>
										<th style = "width:10%; font-size: 14px">Section#10</th>

									</tr>
								</thead>
								<?php
								while ($row = mysqli_fetch_array($result)) {
								?>
								<tbody>
									<tr>
										<td><?php  echo $row['student_id']; ?></td>
										<td><?php  echo $row['lastname']; ?></td>
										<td><?php  echo $row['firstname']; ?></td>
										<td><?php  echo $row['middlename']; ?></td>
										<td><?php  echo $row['email']; ?></td>
										<td><?php  echo $row['username']; ?></td>
										<td><?php  echo $row['password']; ?></td>
										<td><?php  echo $row['course']; ?><?php  echo $row['year']; ?>-<?php  echo $row['section']; ?></td>
										<td><?php  echo $row['subject1']; ?></td>
										<td><?php  echo $row['section1']; ?></td>
										<td><?php  echo $row['subject2']; ?></td>
										<td><?php  echo $row['section2']; ?></td>
										<td><?php  echo $row['subject3']; ?></td>
										<td><?php  echo $row['section3']; ?></td>
										<td><?php  echo $row['subject4']; ?></td>
										<td><?php  echo $row['section4']; ?></td>
										<td><?php  echo $row['subject5']; ?></td>
										<td><?php  echo $row['section5']; ?></td>
										<td><?php  echo $row['subject6']; ?></td>
										<td><?php  echo $row['section6']; ?></td>
										<td><?php  echo $row['subject7']; ?></td>
										<td><?php  echo $row['section7']; ?></td>
										<td><?php  echo $row['subject8']; ?></td>
										<td><?php  echo $row['section8']; ?></td>
										<td><?php  echo $row['subject9']; ?></td>
										<td><?php  echo $row['section9']; ?></td>
										<td><?php  echo $row['subject10']; ?></td>
										<td><?php  echo $row['section10']; ?></td>
									</tr>
								<?php
								}
								?>
								</tbody>
							</table>
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
	<?php } ?>
	<script type="text/javascript">
		$(document).ready(
		function() {
			$("#frmCSVImport").on(
			"submit",
			function() {
				$("#response").attr("class", "");
				$("#response").html("");
				var fileType = ".csv";
				var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+("+ fileType + ")$");
				if (!regex.test($("#file").val().toLowerCase())) {
					$("#response").addClass("error");
					$("#response").addClass("display-block");
					$("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
					return false;
				}
				return true;
			});
		});
	</script>
	<script>
		var message = <?php $message ?>;
		function myFunction() {
		  alert(message);
		}
	</script>
	<script>
		function sortasc() {
		  var table, rows, switching, i, x, y, shouldSwitch;
		  table = document.getElementById("myTable");
		  switching = true;
		  /*Make a loop that will continue until
		  no switching has been done:*/
		  while (switching) {
			//start by saying: no switching is done:
			switching = false;
			rows = table.rows;
			/*Loop through all table rows (except the
			first, which contains table headers):*/
			for (i = 1; i < (rows.length - 1); i++) {
			  //start by saying there should be no switching:
			  shouldSwitch = false;
			  /*Get the two elements you want to compare,
			  one from current row and one from the next:*/
			  x = rows[i].getElementsByTagName("TD")[0];
			  y = rows[i + 1].getElementsByTagName("TD")[0];
			  //check if the two rows should switch place:
			  if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
				//if so, mark as a switch and break the loop:
				shouldSwitch = true;
				break;
			  }
			}
			if (shouldSwitch) {
			  /*If a switch has been marked, make the switch
			  and mark that a switch has been done:*/
			  rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
			  switching = true;
			}
		  }
		}
	</script>
	<script>
		$(document).ready(function () {
		$('#myTable').DataTable({
		"scrollY": "50vh",
		"scrollCollapse": true,
		});
		$('.dataTables_length').addClass('bs-select');
		});
	</script>
</body>
</html>