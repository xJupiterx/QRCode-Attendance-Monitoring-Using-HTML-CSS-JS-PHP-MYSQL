<?php 
include('server.php'); 
include('system-restriction/programcoordinator.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Admin Dashboard</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/scs.png" type="image/x-icon">
</head>

<body>
    <div id="app">
        <?php include('sidebar/progcoor_sidebar.html'); ?>
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

            <form class="main-content container-fluid" method = 'post' action = 'dean-page.php'>
                <div class="page-title">
                    <h3>Program Coordinator Dashboard</h3>
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
									<p class="col-md-12 col-12"><b>Access Level: </b><u><?php echo $_SESSION['accesslevel']; ?></u></p>
									<div class = "row">
                                        <p class="col-md-6 col-12"><b>Name: </b><?php echo $_SESSION['lastname']; ?>, <?php echo $_SESSION['firstname']; ?> <?php echo $_SESSION['middlename']; ?></p>
									    <p class="col-md-6 col-12"><b>Email: </b><u><?php echo $_SESSION['email']; ?></u></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
						<div class="card-header" style="background-color: #3acf61; color:white"><strong><center>Loaded Subjects</center></strong></div>
						<?php
							$sqlSelect = "SELECT * FROM loaded_subjects";
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
						<form class="table-responsive" method='post' style = "height: 410px; overflow: scroll">
							<table id="myTable" class="table table-bordered table-sm" cellspacing="0" width="100%" >
								<thead>
									<tr>
										<th style = "width:250%; font-size: 14px" onclick="sort(1)">Name</th>
										<th style = "width:20%; font-size: 14px">Status</th>
										<th style = "width:25%; font-size: 14px">Schedules</th>
										<th style = "width:25%; font-size: 14px"></th>
										<th style = "width:25%; font-size: 14px"></th>
										<th style = "width:25%; font-size: 14px"></th>
										<th style = "width:25%; font-size: 14px"></th>
										<th style = "width:25%; font-size: 14px"></th>
										<th style = "width:25%; font-size: 14px"></th>
										<th style = "width:25%; font-size: 14px"></th>
									</tr>
								</thead>
								<?php
								while ($row = mysqli_fetch_array($result)) {
								?>
								<tbody>
									<tr>
										<td><?php  echo $row['lastname']; ?>, <?php  echo $row['firstname']; ?> <?php  echo substr($row['middlename'], 0, 1); ?>.</td>
                                        <?php
                                        //display status depends on email
                                        $st = "SELECT status FROM user WHERE email = '$row[email]'";
                                        $st = mysqli_query($db,$st);
                                        $st = mysqli_fetch_assoc($st);
                                        $st = reset($st);
                                        ?>
                                        <?php if($st == 'ACTIVE'): ?>
											<td style = "color:green"><?php  echo $st; ?></td>
                                        <?php endif ?>
										<?php if($st == 'INACTIVE'): ?>
											<td style = "color:red"><?php  echo $st; ?></td>
                                        <?php endif ?>
                                        <?php if($row['sched1'] != ''): ?>
                                            <td><?php  echo $row['sched1']; ?></td>
                                        <?php endif ?>
                                        <?php if($row['sched2'] != ''): ?>
                                            <td><?php  echo $row['sched2']; ?></td>
                                        <?php endif ?>
                                        <?php if($row['sched3'] != ''): ?>
                                            <td><?php  echo $row['sched3']; ?></td>
                                        <?php endif ?>
                                        <?php if($row['sched4'] != ''): ?>
                                            <td><?php  echo $row['sched4']; ?></td>
                                        <?php endif ?>
                                        <?php if($row['sched5'] != ''): ?>
                                            <td><?php  echo $row['sched5']; ?></td>
                                        <?php endif ?>
                                        <?php if($row['sched6'] != ''): ?>
                                            <td><?php  echo $row['sched6']; ?></td>
                                        <?php endif ?>
                                        <?php if($row['sched7'] != ''): ?>
                                            <td><?php  echo $row['sched7']; ?></td>
                                        <?php endif ?>
                                        <?php if($row['sched8'] != ''): ?>
                                            <td><?php  echo $row['sched8']; ?></td>
                                        <?php endif ?>
                                        <?php if($row['sched9'] != ''): ?>
                                            <td><?php  echo $row['sched9']; ?></td>
                                        <?php endif ?>
									</tr>
								<?php
								}
								?>
								</tbody>
							</table>
						</form>
                        <?php } ?>
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