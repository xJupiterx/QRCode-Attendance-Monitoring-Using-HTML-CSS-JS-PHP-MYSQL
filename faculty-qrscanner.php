<?php 
include('server.php');
include('system-restriction/faculty.php');
$datetoday = gmdate("Y/m/j");
$all = "SELECT * from recent_schedule WHERE subject = '" . $_SESSION['usubject'] . "' and section = '" . $_SESSION['usection'] . "' and date_of_schedule = '" . $datetoday . "';";
$all = mysqli_query($db,$all);
$all = mysqli_fetch_assoc($all);

if($all['sched_status'] == 'ON-GOING'){
    header("location: faculty-scannedqr.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Selector</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/scs.png" type="image/x-icon">
    <script type="text/javascript" src="assets/js/qrscanner/adapter.js"></script>
    <script type="text/javascript" src="assets/js/qrscanner/vue.js"></script>
    <script type="text/javascript" src="assets/js/qrscanner/instascan.js"></script>

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
                            <a href="faculty-page.php" class='sidebar-link' style="background-color: #e3e3e3">
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item active ">
                            <a href="faculty-student-info.php" class='sidebar-link' style="background-color: #e3e3e3">
                                <i data-feather="users" width="20"></i>
                                <span>View Student's Information</span>
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
                <section class="section">
                    <form class="row mb-4" action="dean-qrscanner.php" method="POST">
                        <div class="page-title">
                            <div class = 'row'>
                                <div class = 'col-md-4'>
                                </div>
                                <div class = 'col-md-4'>
                                    <div class = 'row'>
                                        <div class = 'col-md-4'>
                                        <center><a href ='faculty-schedule-viewer.php'>Attendance</a></center>
                                        </div>
                                        <div class = 'col-md-4'>
                                        <center><a href ='faculty-qrscanner.php'><u>Start A Class</u></a></center>
                                        </div>
                                        <div class = 'col-md-4'>
                                        <center><a href ='faculty-people.php'>People</a></center>
                                        </div>
                                    <div>
                                </div>
                                <div class = 'col-md-4'>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-6">
                            <div class="card">
                                <div class='card-header' style='background-color: #3acf61;'>
                                    <center><h4 style="color: white"><strong>Scan QR Code</strong></h4></center>
                                </div>
                                <div class='card-body'>
                                    <br>
                                    <div>
                                        <video id="preview" width="100%"></video>
                                    </div>
                                </div>
                                <div class="card-footer" style="background-color: #3acf61;">
                                    <input type="hidden" name="scannedqr" id="text" readonyy="" placeholder="scan qrcode" class="form-control">
                                    <center><p id="test1" style="color: #b31d2c; position:relative; top:7px" ><strong>Scanning...</strong></p></center>
                                </div>
                            </div>
                        </div>
                        <div class = 'col-md-6'>
                            <div class="card">
                                <div class="card-body">
                                    <div class = 'row'>
                                        <div class ='col-md-4'>
                                        </div>
                                        <center><div class ='col-md-4' style = 'width: 300px; position:relative; left:18px'>
                                            <div class = 'row'>
                                                <div class = 'col-md-6'>
                                                    <p style = "background-color: black; font-size:22px; font-weight:bold; color: #3acf61; border:solid; position:relative; top:8px; text-align:center"><span id="time"> </span></p>
                                                </div>
                                                <div class = 'col-md-6'>
                                                    <p style = "background-color: black; font-size:22px; font-weight:bold; color: #3acf61; border:solid; position:relative; top:8px; text-align:center"><?php echo date("m/d/Y"); ?></p>
                                                </div>
                                            </div>
                                        </div></center>
                                        <div class ='col-md-4'>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class = 'row'>
                                        <div class ='col-md-6'>
                                            <center><p style = 'font-size: 22px'><b>Subject: </b><?php echo $_SESSION['usubject'] ?></p></center>
                                        </div>
                                        <div class ='col-md-6'>
                                            <center><p style = 'font-size: 22px'><b>Section: </b><?php echo $_SESSION['usection'] ?></p></center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style='height: 150px; position:relative;'>
                                <div class="card-header" style="background-color: #7a7777">
                                    <h4 style="color:white"><center>Student ID Manual Selector</center></h4>
                                </div>
                                <div class="card-body">
                                    <br>
                                    <div class = 'row'>
                                        <div class = 'col-md-6'>
                                            <div class="position-relative" style='width:100%;'>
                                                <input type="text" name="student_id" class="form-control" id="student_id" placeholder='Enter Student ID' style = 'width:300px'>
                                            </div>  
                                        </div>
                                        <div class = 'col-md-6'>
                                            <div class="clearfix">
                                                <input type="submit" name="selectStud" value="Select Student" class="btn btn-primary float-end">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
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
    <script>
        function refreshTime() {
            var datetime = new Date().toLocaleTimeString('en-GB');
            console.log(datetime); // it will represent date in the console of developers tool
            document.getElementById("time").textContent = datetime;
        }
        setInterval(refreshTime, 1000);
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
        Instascan.Camera.getCameras().then(function(cameras){
           if(cameras.length > 0 ){
               scanner.start(cameras[0]);
           } else{
               alert('No cameras found');
           }

        }).catch(function(e) {
           console.error(e);
        });

        scanner.addListener('scan',function(c){
            document.getElementById('test1').innerHTML = c;
           document.getElementById('text').value=c;
       });
    </script>
</body>
</html>