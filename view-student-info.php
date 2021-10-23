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
</head>

<body>
<center><div class="page-title">
                    <h3> Student Dashboard</h3>
                </div></center>
				<br>
                    <div class="row mb-12">
                        <div class="col-md-12">
                            <div class="card ">
                                <div class="card-header" style="background-color: #3acf61">
                                    <h4 style="color: white"><strong>Student Details</strong></h4>
                                </div>
                                <div class="card-body">
									<br>
									<center><p class="col-md-12 col-12"><b>Student ID: </b><?php echo $_SESSION['sstudent_id']; ?></p></center>
									<p class="col-md-4 col-12"><b>Course/Year/Section: </b><?php echo $_SESSION['scourse']; ?> <?php echo $_SESSION['syear']; ?>-<?php echo $_SESSION['ssection']; ?></p>
									<div class="row">
										<p class="col-md-4 col-12"><b>Last name: </b><u><?php echo $_SESSION['slastname']; ?></u></p>
										<p class="col-md-4 col-12"><b>First name: </b><u><?php echo $_SESSION['sfirstname']; ?></u></p>
										<p class="col-md-4 col-12"><b>Middle name: </b><u><?php echo $_SESSION['smiddlename']; ?></u></p>
									</div>
                                </div>
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
</body>

</html>