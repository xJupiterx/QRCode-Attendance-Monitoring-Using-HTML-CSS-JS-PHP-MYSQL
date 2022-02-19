<?php 
include('server.php');
include('system-restriction/systemadmin.php');
?>
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
                <center><div class="page-title">
                    <h3>View System Admin Complete Information</h3>
                </div></center>
				<br>
                <form class="card " method = 'post'>
                    <div class="card-header" style="background-color: #3acf61">
                        <h4 style="color: white"><center><strong>Edit Details</strong></center></h4>
                    </div>
                    <div class="card-body">
						<br><br>
                        <center><h2 class='col-md-6' style=''><b>Access Level: <?php echo $_SESSION['accesslevel']; ?></b></h2></center>
                        <br><br>
                        <div class = 'row'>
                            <p class='col-md-2' style='font-size:18px;position:relative;'><b>First Name:</b></p>
                            <div class = 'col-md-2'>
                                <input type='input' name = 'sysfirstname' value="<?php echo $_SESSION['firstname']; ?>" style='position:relative; right:63px; width:188px'>
                            </div>
                            <p class='col-md-2' style='font-size:18px;position:relative; left:10px'><b>Middle Name:</b></p>
                            <div class = 'col-md-2'>
                                <input type='input' name = 'sysmiddlename' value="<?php echo $_SESSION['middlename']; ?>" style='position:relative; right:35px; width:188px'>
                            </div>
                            <p class='col-md-2' style='font-size:18px;position:relative; left:15px'><b>Last Name:</b></p>
                            <div class = 'col-md-2'>
                                <input type='input' name = 'syslastname' value="<?php echo $_SESSION['lastname']; ?>" style='position:relative; right:50px; width:188px'>
                            </div>
                        </div>
                        <div class = 'row'>
                            <p class='col-md-6' style='font-size:18px;position:relative; right:1px'><b>Email:</b></p>
                            <div class = 'col-md-6'>
                                <input type='input' name = 'sysemail' value="<?php echo $_SESSION['email']; ?>" style='width:500px; position:relative; right:400px'>
                            </div>
                        </div>
                        <div class = 'row'>
                            <p class='col-md-6' style='font-size:18px;position:relative; right:1px'><b>Username:</b></p>
                            <div class = 'col-md-6'>
                                <input type='input' name = 'sysun' value="<?php echo $_SESSION['username']; ?>" style='width:500px; position:relative; right:400px'>
                            </div>
                        </div>
                        <br><br>
                        <div class='clearfix'>
                            <center>
                            <input type="submit" name="UpdateDeanInfo" value="Update Data" class="btn btn-primary" onclick="return  confirm('Do you really want to modify information?')">
                            </center>
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: gray; height:30px; position:relative">
                         <h6 style="color: white; position:relative; bottom:3px"><center>Click the data inside input box to modify data.</center></h6>
                    </div>
                </form>
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