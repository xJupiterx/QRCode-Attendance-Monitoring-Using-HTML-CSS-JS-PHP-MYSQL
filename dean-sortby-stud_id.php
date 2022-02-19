<?php 
include('server.php');
include('system-restriction/dean.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">
	<link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/scs.png" type="image/x-icon">
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
                    <h3>Please Select Student</h3>
                </div>
				<br>
				<section class="col-md-12">
					<div class="card">
						<div class="card-header" style="background-color: #3acf61; color:white"><strong><center>List of Student Information</center></strong></div>
						<?php
							$sqlSelect = "SELECT * FROM student";
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
						<form class="table-responsive" method='post'>
							<table id="myTable" class="table table-bordered table-sm" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th style = "width:8%; font-size: 14px" onclick="sort(0)">Student_ID</th>
										<th style = "width:16%; font-size: 14px" onclick="sort(1)">Name</th>
										<th style = "width:8%; font-size: 14px" onclick="sort(2)">Email</th>
										<th style = "width:8%; font-size: 14px" onclick="sort(3)">Course-Year-Section</th>
									</tr>
								</thead>
								<?php
								while ($row = mysqli_fetch_array($result)) {
								?>
								<tbody>
									<tr>
										<td style = "color:white"><?php  echo $row['student_id']; ?>
											<div>
												<input type="submit" name="SortStudent" value=<?php  echo $row['student_id']; ?> style="background-color:white; border:none; color: blue; position:relative; bottom:14px">
											</div>
										</td>
										<td><?php  echo $row['lastname']; ?>, <?php  echo $row['firstname']; ?> <?php  echo substr($row['middlename'], 0, 1); ?>.</td>
										<td><?php  echo $row['email']; ?></td>
										<td><center><?php  echo $row['course']; ?><?php  echo $row['year']; ?>-<?php  echo $row['section']; ?></center></td>
									</tr>
								<?php
								}
								?>
								</tbody>
							</table>
						</form>
					</div>
				</section>
            </div>
        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
    <script src="assets/js/main.js"></script>
	<?php } ?>
	<script>
		function sort(n) {
		  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
		  table = document.getElementById("myTable");
		  switching = true;
		  //Set the sorting direction to ascending:
		  dir = "asc"; 
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
			  x = rows[i].getElementsByTagName("TD")[n];
			  y = rows[i + 1].getElementsByTagName("TD")[n];
			  /*check if the two rows should switch place,
			  based on the direction, asc or desc:*/
			  if (dir == "asc") {
				if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
				  //if so, mark as a switch and break the loop:
				  shouldSwitch= true;
				  break;
				}
			  } else if (dir == "desc") {
				if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
				  //if so, mark as a switch and break the loop:
				  shouldSwitch = true;
				  break;
				}
			  }
			}
			if (shouldSwitch) {
			  /*If a switch has been marked, make the switch
			  and mark that a switch has been done:*/
			  rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
			  switching = true;
			  //Each time a switch is done, increase this count by 1:
			  switchcount ++;      
			} else {
			  /*If no switching has been done AND the direction is "asc",
			  set the direction to "desc" and run the while loop again.*/
			  if (switchcount == 0 && dir == "asc") {
				dir = "desc";
				switching = true;
			  }
			}
		  }
		}
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